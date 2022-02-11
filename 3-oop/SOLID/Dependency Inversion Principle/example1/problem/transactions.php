<?php
// high level module


include_once "userWallet.php";
class transcation {

    
    public function showTransaction()
    {
        $userWallet = new userWallet(100);
        // DIP =>
        //  high level modules should not depend on low level modules
        // both shold depend on abstraction 
        //abstraction should not depend on details (concrete classes)
        // details (concrete class) should depend on abstraction
        $balance = $userWallet->getBalance();
        $history = $this->showHistory($userWallet);
        return [$balance,$history];
    }

    public function showHistory(userWallet $userWallet)
    {
        return "user wallet history";
    }
}

// $transaction = new transcation;
// $transaction->showTransaction();
