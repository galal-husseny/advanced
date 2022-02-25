<?php 
namespace App\Controllers\Auth;

class LoginController {
    public function index()
    {

    }

    public function login($data)
    {
        
    }

    public function logout()
    {
        app()->session->forget('auth');
        return redirect('signin');
    }
}