<?php
session_start();
include_once "app/middlewares/auth.php";
unset($_SESSION['user']);
setcookie("email","",time()-1,"/");
header('location:login.php');