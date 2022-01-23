<?php
// low level module
class employeeWallet implements Wallet {
    public $balance;
    public $employee_id;

    public function employeeWallet($employee_id)
    {
        $this->employee_id = $employee_id;
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