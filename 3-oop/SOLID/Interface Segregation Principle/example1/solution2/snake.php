<?php
include_once "generalAnimal.php";
class snake implements generalAnimal{
    public function eat()
    {
        return "meat";
    }
    public function drink()
    {
        return "water";
    }
     // error X
     // ISP => splits interfaces that is very larage into smaller and more specific ones 
     // so that the clients (concrete classes) will only have to know about methods that are of 
     // interest to them
    
}