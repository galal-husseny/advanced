<?php 
namespace App\Controllers\Auth;

use Src\Auth\Auth;
use App\Models\User;
use Src\Support\Hash;
use Src\Validation\Validator;

class LoginController {
    public function index()
    {
        return view('Auth.login');
    }

    public function login($data)
    {
        // validation
        $validator = new Validator;
        $validator->make($data,[
            'email'=>['required','email','exists:users,email'],
            'password'=>['required']
        ]);
        // get user from database
        $user = User::where(['email','=',$data['email']])->first();
        // password check
        if(!Hash::check($data['password'],$user->password)){
            session()->setFlash('wrong-attempt','these credentional dosen\'t match our records');
            back();
        }
        // Auth::login($user);
        Auth::login($user);
        // check if user verified
        if(! $user->email_verified_at){
            return redirect('verify-account');
        }
        // check if he want to remember
        if(isset($data['remember_me'])){
            Auth::remember($user);
        }
        // redirect to dashboard
        return redirect('dashboard');
    }

    public function logout()
    {
        session()->forget('auth');
        if(Auth::checkOnRemember()){
            Auth::rememberExpiration();
        }
        return redirect('signin');
    }
}