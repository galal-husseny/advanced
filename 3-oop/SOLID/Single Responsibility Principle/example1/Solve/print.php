<?php 
class prints {
    // print invoice
    public function printInvoice()
    {
        return "
            Invoice Number : $this->id <br>
            Price : $this->price <br>
            Quantity : $this->quantity <br>
            tax : $this->tax <br>
            discount : $this->discount <br>
            total : $this->total <br>
        ";
    }


     // print invoice
     public function printPurchase()
     {
         return "
             Invoice Number : $this->id <br>
             Price : $this->price <br>
             Quantity : $this->quantity <br>
             tax : $this->tax <br>
             discount : $this->discount <br>
             total : $this->total <br>
         ";
     }


      // print invoice
    public function printContracts()
    {
        return "
            Invoice Number : $this->id <br>
            Price : $this->price <br>
            Quantity : $this->quantity <br>
            tax : $this->tax <br>
            discount : $this->discount <br>
            total : $this->total <br>
        ";
    }


     // print invoice
     public function printEmpolyees()
     {
         return "
             Invoice Number : $this->id <br>
             Price : $this->price <br>
             Quantity : $this->quantity <br>
             tax : $this->tax <br>
             discount : $this->discount <br>
             total : $this->total <br>
         ";
     }


    
}