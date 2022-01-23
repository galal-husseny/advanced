<?php
include_once "animal.php";
class cat implements animal{
    public function eat()
    {
        return "cheese";
    }
    public function drink()
    {
        return "milk";
    }
    public function run()
    {
        return "with legs";
    }
}