<?php
include_once "person.php";
class manger extends person {
    public const bonus = 1000;
    public function CalculateSalaryPerHour($hours = 176)
    {
        return (($this->basicSalary + manger::bonus) / $hours);
    }
}