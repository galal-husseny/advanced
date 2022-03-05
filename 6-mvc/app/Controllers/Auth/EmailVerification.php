<?php

namespace App\Controllers\Auth;

use Src\Auth\Auth;
use Src\View\View;
use App\Models\User;
use Src\Validation\Validator;
use App\Mailables\VerificationMail;

class EmailVerification
{

    public function index()
    {
        $email_expired_at = Auth::user()->email_expired_at;
        return view('Auth.verify-account',compact('email_expired_at'));
    }
    public function verify($data)
    {
        $email = decrypt(rawurldecode($data['signture']));
        // get user
        $validator = new Validator;
        $validator->make(compact('email'), [
            'email' => ['required', 'email', 'exists:users,email']
        ], false);
        if (!$validator->passed()) {
            abort(419);
        }
        $user = User::select(filter: ['email', '=', $email])->first();

        if ($user->email_verified_at) {
            abort(419);
        }
        // 2022-3-5 13:00:00
        $now = date('Y-m-d H:i:s');
        if($user->email_expired_at < $now){
            abort(419);
        }

        User::update(
            ['email_verified_at' => $now],
            ['email', '=', $email]
        );
        // change column email_verified_at = date('Y-m-d H:i:s')
        // redirect to page
        Auth::login($user);
        return redirect('dashboard');
    }

    public function resend()
    {
        $subject = "Email Verification";
        $signture = rawurlencode(encrypt(Auth::user()->email));
        $params = ['name'=>Auth::user()->name,'signture'=>$signture];
        $body = View::getViewContent('Mails.VerificationMail',params:$params);
        $verificationMailResult = (New VerificationMail(Auth::user()->email,$subject,$body))->send();
        if($verificationMailResult){
            // redirect
            User::update([
                'email_expired_at',
                '=',
                date("Y-m-d H:i:s",strtotime('+'.env('VERIFICATION_EXPIRATION').' seconds'))],
                ['id',
                '=',
                Auth::user()->id
            ]);
            session()->setFlash('success','We Have Sent You An Email Address Please Check Your MailBox');
        }else{
            session()->setFlash('error','Please Try Again Later');
        }
        return back();
    }
}
