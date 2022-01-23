<?php
include_once "person.php";
class employee extends person{
    public function CalculateSalaryPerHour($hours = 176)
    {
        return ($this->basicSalary / $hours);
    }
}

// 5000
// 5000 / (8*22) = 25