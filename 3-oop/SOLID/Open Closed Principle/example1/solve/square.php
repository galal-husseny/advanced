<?php
include_once "shape.php";
class square implements shape {
    public $side;

    public function getArea()
    {
        return $this->side * $this->side;
    }
}