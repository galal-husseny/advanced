<?php
include "square.php";
include "rectangle.php";
include "circle.php";
class calculation {
    public function area(object $shape)
    {
        if($shape instanceof square){
            return $shape->side * $shape->side;
        }elseif($shape instanceof rectangle){
            return $shape->width * $shape->length;
        }elseif($shape instanceof circle){
            return ($shape->raduis**2) * pi();
        }
    }
}
// $square = new square;
// $square->side = 5;

// $rect = new rectangle;
// $rect->length = 10;
// $rect->width = 5;

// $calculation = new calculation;
// echo "square area is :" . $calculation->area($square) . '<br>';
// echo "rect area is :" . $calculation->area($rect) . '<br>';

// open close principle
// OCP => software entities (modules-classes-functions) Should Be Open For extension And closed for 
// modifications