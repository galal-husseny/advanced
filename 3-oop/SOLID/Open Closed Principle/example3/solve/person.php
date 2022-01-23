<?php

abstract class person {
    public $id;
    public $name;
    public $basicSalary;
    public abstract function calculateSalaryPerHour($hours);
}