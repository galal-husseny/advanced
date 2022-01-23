<?php
include_once "employee.php";
include_once "manger.php";
class main {
    public function main()
    {
        $employee = new employee;
        $employee->id = 1;
        $employee->name = "galal";
        $employee->basicSalary = 1000;
        $salaryPerHour = $employee->CalculateSalaryPerHour(); 
        echo $salaryPerHour; // 5.68


        // but if we want to calculate salary for manger and add some bonus in this case
        $manger = new manger;
        $manger->id = 1;
        $manger->name = "galal";
        $manger->basicSalary = 1000;
        $mangerSalary= $employee->CalculateSalaryPerHour(); 
        echo $mangerSalary; // 11.3
    }
}

$main = new main;

// coupling(loose,high)