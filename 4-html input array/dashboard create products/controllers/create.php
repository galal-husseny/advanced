<?php
session_start();
if($_POST){
    include_once __DIR__ .'/../models/product.php';
    $product = new product;
    foreach ($_POST['products'] as $index => $pro) {
        $product->create($pro);
    }
    $_SESSION['message'] = "Products Saved Successfully";
    header('location:../');die;
}else{
    throw new Exception("Method Not Allowed",405);
}