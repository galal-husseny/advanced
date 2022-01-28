<?php
include_once "users/auth/login/login.php";
include_once "admins/auth/login/login.php";


$user = new users\auth\login\login;
print_r($user);

$admin = new admins\auth\login\login;
print_r($admin);