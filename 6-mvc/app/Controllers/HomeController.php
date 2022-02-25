<?php

namespace App\Controllers;

use Src\View\View;

class HomeController {
    public function index()
    {
        return view ('home',['page'=>'home']);
    }
}