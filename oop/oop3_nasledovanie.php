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
function __construct($x1, $y1,$w,$h)
{
    parent::__construct($x1, $y1);
    $this->width=$w;
    $this->height=$h;
}
//переопределение функции
function Show()
{
    parent::Show(); // TODO: Change the autogenerated stub
    echo "<br>Width:$this->width,Height: $this->height";
}
}
$r = new Rectangle(100,200,250,150);
$r->Show();