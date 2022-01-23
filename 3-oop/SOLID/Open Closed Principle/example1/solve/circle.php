<?php
include_once "shape.php";
class circle implements shape{
    public $raduis;
    public function getArea()
    {
        return ($this->raduis**2) * pi();
    }
}