<?php

namespace App\Controllers\Auth;

use Src\Auth\Auth;
use Src\View\View;
use App\Models\User;
use Src\Validation\Validator;
use App\Mailables\VerificationMail;

class ResetPasswordController
{
    const NOT_USED_LINK=0,USED_LINK=1;

    public function index($data)
    {
        $this->signtureValidation($data);
        return view('Auth.reset-password',['signture'=>rawurlencode($data['signture'])]);
    }

    public function changePassword($data)
    {
        $this->signtureValidation($data);
        $token = rawurlencode($data['signture']);
        $signtures = explode('||',decrypt(rawurldecode($token)));
        $email = $signtures[0];
        $validator = new Validator;
        $validator->make($data,[
            'password'=>['required','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/','confirmed'],
            'password_confirmation'=>'required'
        ]);
        User::update(['password'=>bcrypt($data['password'])],['email','=',$email]);
        app()->db->query("UPDATE `password_resets` set `status` = ? WHERE `email`= ? AND `token` = ?",[
            self::USED_LINK,
            $email,
            $token
        ]);
        return redirect('signin');
    }

    public function emailVerificationIndex()
    {
        return view('Auth.verify-email');
    }

    public function emailVerification($data)
    {
        
        

        $this->emailVerificationValidation($data);
        
        $exiprationDate = date('Y-m-d H:i:s',strtotime('+' . env('VERIFICATION_EXPIRATION') . ' seconds'));
        $simpleString = $data['email'] . '||' . $exiprationDate;
        $signture = rawurlencode(encrypt($simpleString)); 
        // save request to reset password table
        app()->db->query("INSERT INTO `password_resets` (`email`,`token`) VALUES (?, ?) ",[$data['email'],$signture]);
        // send mail
         $subject = "Reset Password Mail";
         $params = ['name'=>$data['name'],'signture'=>$signture,'expirationDate'=>$exiprationDate];
         $body = View::getViewContent('Mails.ResetPasswordMail',params:$params);
         $ResetPasswordMailResult = (New VerificationMail($data['email'],$subject,$body))->send();
         if($ResetPasswordMailResult){
             // redirect
             session()->setFlash('success','We Have Sent You A Fresh Email , Please Verify Your Mail Box Before Expiration');
         }else{
             session()->setFlash('error','Please Try Again Later');
         }
         return back();
    }

    private function emailVerificationValidation($data)
    {
        // validation
        $validator = new Validator;
        $validator->make($data,[
            'email'=>['required','exists:users,email','email']
        ]);
        $now = date('Y-m-d H:i:s');
        $forgetPasswordRequest = app()->db->query("SELECT
                            `id`,
                            `email`,
                            DATE_ADD(`created_at`, INTERVAL ? SECOND) AS `possible_resend_mail_date`
                        FROM
                            `password_resets`
                        WHERE
                            `email` = ?
                        ORDER BY
                            `created_at`
                        DESC
                        LIMIT 1",[env('VERIFICATION_EXPIRATION'),$data['email']]
                        );
        if($forgetPasswordRequest[0]['possible_resend_mail_date'] > $now){
            session()->setFlash('error','We Already Sent you An Email Please Check Your Mail Box');
            return back();
        }
    }

    private function signtureValidation($data){
        $token = rawurlencode($data['signture']);
        $signtures = explode('||',decrypt(rawurldecode($token)));
        $email = $signtures[0];
        $expirationDate = $signtures[1];
        $now = date('Y-m-d H:i:s');
        // wrong email,token,used

        $result = app()->db->query("SELECT * FROM `password_resets` WHERE `email` = ? AND `token` = ? AND `status` =  ?",
        [
            $email,
            $token,
            self::NOT_USED_LINK
        ]);
        
        if(!$result || $expirationDate < $now){
            abort(419);
        }
    } 

}
