<?php

class media {
     // save file
     public function saveInvoice()
     {
         return file_put_contents('new_invoice.pdf','new order');
     }

     
}