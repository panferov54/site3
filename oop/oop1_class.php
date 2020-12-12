<?php
error_reporting(E_ALL);
//создание класса
class Point{
    //поля класса
    public $x=4;
    public $y;
//создаем магический метод(конструктор), исп для получения и обработки значений поступаемых извне класса

function __construct($x1,$y1)
{
    $this->x=$x1;
    $this->y=$y1;
}

    function Show(){
        echo "<br>Vertex:($this->x,$this->y)";
    }

}

// для работы с классом мы должны сохдать объект этого класса
$p=new Point(5,2);
echo $p->x;
$p->y=8;
$p->Show();
$p->y*=5;
$p->Show();