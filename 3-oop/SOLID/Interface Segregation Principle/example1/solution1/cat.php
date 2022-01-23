<?php
include_once "generalAnimal.php";
include_once "animalWithLegs.php";
class cat implements generalAnimal,animalWithLegs{
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