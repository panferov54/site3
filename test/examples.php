<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo "TEST" ?>></title>
</head>
<body>
<?php
error_reporting(E_ALL);

$n1=10;
$n2=200;
$sun=$n1+$n2;

echo $sun; //вывод строки
//в '' это будет строка, в двойных будет выводится значение
echo "<br>";
echo '$n1+$n2='."<br>";
echo "$n1+$n2=".$sun."<br>";

var_dump($sun);//информация о переменной
echo "<br>";

print "<h1>$sun</h1>";
echo "<br>";
$text='work';
echo '<button onclick="alert(\'Привет всем\')">Жми меня</button>';
echo "<br>";
echo "<i>Sum is</i> <span style='color: red'>$sun</span>";
echo "<br>";
//примеры массивов
$ar1=array();//инициализация пустого массива
$ar2=[];
$ar3=[10,20,30];
$ar4=array('Mark','Svetlana','Denis');

$ar5=['yellow'=>'banana','red'=>'cherry','green'=>'apple'];
//ассоциативный массив аналог объекта из ДЖС


echo $ar5['yellow'];
echo "<br>";

echo $ar4[2];
echo "<br>";
print_r ($ar4);//вывод массива
echo "<br>";
echo count($ar4);
echo "<br>";



//перебор элементов массива
for ($i =0;$i<count($ar4);$i++){
    echo $ar4[$i]." ";
}

//перебор ассоциативного маччива через foreach
echo "<br>";
foreach ($ar5 as $key=>$value) {
    echo "key: $key; Value: $value <br>";
}
?>
</body>
</html>