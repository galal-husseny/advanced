<?php

class employee {
    public $id;
    public $name;
    public $basicSalary;
    public $type;
    public const bonus = 1000;
    public function CalculateSalaryPerHour($hours = 176,$type)
    {
        if($type == 'manger'){
            return ($this->basicSalary + employee::bonus) / $hours;

        }else{
            return $this->basicSalary / $hours;

        }
    }
}

// 5000
// 5000 / (8*22) = 25