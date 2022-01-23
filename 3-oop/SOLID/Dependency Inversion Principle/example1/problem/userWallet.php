<?php
// low level module
class userWallet implements Wallet {
    public $balance;
    public $user_id;

    public function userWallet($user_id)
    {
        $this->user_id = $user_id;
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