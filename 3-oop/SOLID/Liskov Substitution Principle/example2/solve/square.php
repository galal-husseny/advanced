<?php
include_once "shape.php";
class square implements shape {
    private $side;
    

    /**
     * Set the value of side
     *
     * @return  self
     */ 
    public function setSide($side)
    {
        $this->side = $side;

        return $this;
    }

    public function getArea()
    {
       return $this->side * $this->side;
    }
}

// rect => w , l
// square is a special case of rect
// w = l
// square extends rect