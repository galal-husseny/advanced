<?php
// high level module
// uncle bob
include_once "wallet.php";
class transcation {
    private $wallet;
    public function transcation(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    public function showTransaction()
    {
        // DIP =>
        //  high level modules should not depend on low level modules
        // both shold depend on abstraction
        // abstraction should not depend on details (concrete classes)
        // details (concrete class) should depend on abstraction
        $balance = $this->wallet->getBalance();
        $history = $this->showHistory($this->wallet);
        return [$balance,$history];
    }

    public function showHistory()
    {
        return "user wallet history";
    }
}
