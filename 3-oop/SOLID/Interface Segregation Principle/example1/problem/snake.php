<?php
include_once "animal.php";
class snake implements animal{
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
    public function run()
    {

    }
}