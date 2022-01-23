<?php
include_once "rect.php";
class square extends rect {
    public function setWidth($width) // 10
    {
        $this->width = $width;
        $this->length = $width;
    }

    public function setLength($length) // 5
    {
        $this->width = $length;
        $this->length = $length;
    }
}

// rect => w , l
// square is a special case of rect
// w = l
// square extends rect