<?php
include_once "users/auth/login/login.php";
include_once "admins/auth/login/login.php";
use users\auth\login\login;
use admins\auth\login\login AS admins;

$user = new login;
print_r($user);

$admin = new admins;
print_r($admin);
