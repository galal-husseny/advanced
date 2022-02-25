<?php 
namespace App\Controllers\Auth;

use Src\Auth\Auth;
use App\Models\User;
use Src\Validation\Validator;

class EmailVerification {
    public function verify($data)
    {
        // get user
        $validator = new Validator;
        $validator->make($data,[
            'email'=>['required','email','exists:users,email']
        ],false);
        if(!$validator->passed()){
            abort(403);
        }
        $user = User::select(filter:['email','=',$data['email']]);
        if($user[0]->email_verified_at){
           abort(403); 
        }
        User::update(['email_verified_at'=>date('Y-m-d H:i:s')],
        ['email','=',$data['email']]
    );
        // change column email_verified_at = date('Y-m-d H:i:s')
        // redirect to page
        Auth::login($user[0]);
        return redirect('dashboard');
    }
}