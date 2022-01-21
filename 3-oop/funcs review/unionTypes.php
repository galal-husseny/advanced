<?php
// PHP V.8
declare(strict_types=1);
function test (int|float $message) :array|object{
    echo $message;
}

test(NULL);