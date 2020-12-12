<?php
//Инкапсуляция одна из 3 парадигм ООП. Механизм сокрытия реализации и сохранения целостности данных


//пример инкапсуляции с модификаторами доступа

class MyClass{
    public $public='Public';
    protected $protected='Protected';
    private $private='Private';

    function printMod(){

    }
}

$obj=new MyClass;
echo $obj->public;
//echo $obj->protected;
//echo $obj->private;

//модификатор public может быть вызван через экземпляр класса извне
//private - доступен только внутри класса
//protected - не доступен извне но доступен внутри класса и внутри дочерних классов