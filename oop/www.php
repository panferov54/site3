<?php


class Point{

    public $x;
    public $y;

    function __construct($x1,$y1)
    {
        $this->x=$x1;
        $this->y=$y1;
    }

    function Show(){
        echo "<br>Vertex:($this->x,$this->y)";
    }

}

class Rectangle extends Point {
    public $width;
    public $height;

}
$r = new Rectangle();
$r->Show();