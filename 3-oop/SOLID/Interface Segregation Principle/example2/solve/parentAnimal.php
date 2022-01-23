<?php

interface parentAnimal {
    function eat();
    function drink();
}


// cat => implements runnableAnimal,parentAnimal => run , drink , eat

// snake =>   implements parentAnimal => drink , eat

// duck => implements parentAnimal,runnableAnimal,flyableAnimal

// sparrow => implements parentAnimal,flyableAnimal

