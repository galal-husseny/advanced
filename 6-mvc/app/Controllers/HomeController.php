<?php

namespace App\Controllers;

class HomeController {
    public function index()
    {
        // return view('home');
        echo "hello from home";
    }

    public function user()
    {
        // return view('home');
        echo "hello from user";
    }

    public function test()
    {
        echo "test with post request";
    }
}