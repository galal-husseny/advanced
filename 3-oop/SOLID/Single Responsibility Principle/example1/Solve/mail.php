<?php

class mail {
    // send mail 
    public function sendMailWithInvoice()
    {
       if(mail('galal.husseny@gmail.com','New Order',$this->printInvoice())){
            return true;
       }else{
           return false;
       }
    }
}