<?php

class wallet {
    private $balance;
    /**
     * Get the value of balance
     */ 
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set the value of balance
     *
     * @return  self
     */ 
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }
    // deposite
    public function deposite( $depositeValue )
    {
       $this->balance += $depositeValue +50;
    }
    // withdraw
    public function withdraw(  $withdrawValue)
    {
        $this->balance -= $withdrawValue;
    }
    
}