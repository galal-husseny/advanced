<?php 
namespace App\Controllers\Auth;

use App\Mailables\VerificationMail;
use App\Models\User;
use Src\Validation\Validator;
use Src\View\View;

class RegisterController {
    public function index()
    {
        return view('Auth.register');
    }

    public function store($data)
    {

        // validation
        $validator = new Validator;
        $validator->make($data,[
            'name'=>['required','between:8,32'],
            'email'=>['required','email'], // ,'unique:users,email'
            'password'=>['required','confirmed','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/'],
            'password_confirmation'=>['required'],
            'gender'=>['required','enum:m,f']
        ]);
        // insert user into database
        User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'gender'=>$data['gender'],
            'password'=>bcrypt($data['password']),
            'email_expired_at'=>date("Y-m-d H:i:s",strtotime('+'.env('VERIFICATION_EXPIRATION').' seconds'))
        ]);
        // send mail
        $subject = "Verification Mail";
        $signture = rawurlencode(encrypt($data['email']));
        $params = ['name'=>$data['name'],'signture'=>$signture];
        $body = View::getViewContent('Mails.VerificationMail',params:$params);
        $verificationMailResult = (New VerificationMail($data['email'],$subject,$body))->send();
        if($verificationMailResult){
            // redirect
            session()->setFlash('success','Regsiterd Successfully ! Please Check Your Mailbox For Verificaiton Link');
        }else{
            session()->setFlash('error','Please Try Again Later');
        }
        return back();

        
    }
}