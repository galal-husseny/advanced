<?php
// low level module
class supplierWallet implements Wallet {
    public $balance;
    public $supplier_id;

    public function supplierWallet($supplier_id)
    {
        $this->supplier_id = $supplier_id;
    }

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
}