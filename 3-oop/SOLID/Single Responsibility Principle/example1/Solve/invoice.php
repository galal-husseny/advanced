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
    // calculate total 
    public function calculateTotal()
    {
       $this->total = ($this->price * $this->quantity) - $this->calculateDiscount() + $this->calculateTax(); // 300
       return $this->total;
    }
    
    public function calculateDiscount()
    {
        return  $this->price * $this->discountPercentage;
    }

    public function calculateTax()
    {
        return  $this->price * $this->tax;
    }
}

$invoice = new invoice(100,2,0.1,0.14);