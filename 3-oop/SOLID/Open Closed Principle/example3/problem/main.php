<?php
include_once "employee.php";
class main {
    public function main()
    {
        $employee = new employee;
        $employee->id = 1;
        $employee->name = "galal";
        $employee->basicSalary = 1000;
        $salaryPerHour = $employee->CalculateSalaryPerHour();
        echo $salaryPerHour;
        // but if we want to calculate salary for manger and add some bonus in this case
    }
}

$main = new main;