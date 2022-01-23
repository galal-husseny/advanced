<?php
include_once "generalAnimal.php";
interface animalWithLegs extends generalAnimal{
    function run();
}