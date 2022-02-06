<?php

namespace App\Controllers;

use Src\View\View;

class HomeController {
    public function index()
    {
        // return view('home');
        // echo "hello from home";
        // $page = "home";
        // return view('home',compact('page'));
        return view ('home',['page'=>'home']);
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function test()
    {
        // abort(405);
    }
}