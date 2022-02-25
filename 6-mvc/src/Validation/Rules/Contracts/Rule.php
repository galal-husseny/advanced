<?php 
namespace Src\Validation\Rules\Contracts;
interface Rule {
    function apply($field,$value,$data) :bool; // if no validation error => TRUE | if there are any validation Error => false
    function __toString(); // object => when you deal with object as string => to string method will be invoked
}

