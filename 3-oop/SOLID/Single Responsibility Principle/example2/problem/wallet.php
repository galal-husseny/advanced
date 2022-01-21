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
       $this->balance += $depositeValue;
    }
    // withdraw
    public function withdraw(  $withdrawValue)
    {
        $this->balance -= $withdrawValue;
    }
    // print , get report
    public function getWalletReports()
    {
        echo "Balance : $this->balance in this month";
    }
    // print , get Transation
    public function getOldWalletTransactions()
    {
        echo "Balance : $this->balance in last month";
    }
}