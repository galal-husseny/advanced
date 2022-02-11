<?php 
include_once "Model.php";

class User extends Model {

}

echo User::classNameUsingSelf();

echo "<br>";

echo User::classNamUsingStatic();