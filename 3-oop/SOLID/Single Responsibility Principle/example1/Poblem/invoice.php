<?php

// SRP => the smallest unit(func-class-module) in your code (project) should have one responsibilty 
// futhermore it should only have one reason to change
// features : 1) easy to test
// 2) easier to understand 
// 3) Organzied
// 4) lower coupling (fewer dependencies)

class invoice {
    private $id;
    private $price;
    private $quantity;
    private $discountPercentage;
    private $tax;
    private $total;

    // setter
    public function __construct($price, $quantity,$discountPercentage,$tax) {
        $this->price = $price;
        $this->quantity = $quantity;
        $this->discountPercentage = $discountPercentage;
        $this->tax = $tax;
    }
    // calculate total , print
    public function calculateTotal()
    {
       $discount = $this->price * $this->discountPercentage;
       $tax = $this->price * $this->tax;
       $this->total = ($this->price * $this->quantity) - $discount + $tax; // 300
       echo $this->total;
    }

    public function printInvoice()
    {
        return "
            Invoice Number : $this->id <br>
            Price : $this->price <br>
            Quantity : $this->quantity <br>
            tax : $this->tax <br>
            discount : $this->discount <br>
            total : $this->total <br>
        ";
    }

    public function sendMailWithInvoice()
    {
       if(mail('galal.husseny@gmail.com','New Order',$this->printInvoice())){
            file_put_contents('new_invoice.pdf','new order');
       }else{
           return false;
       }
    }
}

$invoice = new invoice(100,2,0.1,0.14);