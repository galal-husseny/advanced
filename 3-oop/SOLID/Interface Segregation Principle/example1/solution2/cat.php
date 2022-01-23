<?php
include_once "animalWithLegs.php";
class cat implements animalWithLegs{
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