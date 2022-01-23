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
}