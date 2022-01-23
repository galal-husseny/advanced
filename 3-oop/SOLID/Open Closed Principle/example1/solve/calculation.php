<?php
include_once "square.php";
include_once "rectangle.php";
// include_once "circle.php";
class calculation {
    public function area(object $shape)
    {
        return $shape->getArea();
    }
}
$square = new square;
$square->side = 5;

$rect = new rectangle;
$rect->length = 10;
$rect->width = 5;

// $circle = new circle;
// $circle->raduis = 5;

$calculation = new calculation;
echo "square area is :" . $calculation->area($square) . '<br>';
echo "rect area is :" . $calculation->area($rect) . '<br>';
// echo "circle area is :" . $calculation->area($circle) . '<br>';
// open close principle
// OCP => software entities (modules-classes-functions) Should Be Open For extension And closed for 
// modifications