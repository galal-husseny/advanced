<?php
include_once "shape.php";

class rectangle implements shape {
    public $width;
    public $length;

    public function getArea()
    {
        return $this->length * $this->width;
    }
}