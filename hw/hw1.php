<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
echo 'Задание 1';
echo '<br>';
$name='Mihail';
echo 'Hello! My name is &quot'.$name.'&quot';
echo '<br>';
echo 'Задание 2';
echo '<br>';
$age=31;
echo "I'm $age";
echo '<br>';
echo 'Задание 3';
echo '<br>';
$a=2;
$b=4;
$rez=$a+$b;
echo "$a + $b = $rez";
echo '<br>';
echo 'Задание 4';
echo '<br>';

$a = $a ^ $b;
$b = $b ^ $a;
$a = $a ^ $b;
echo "$a , $b ";
echo '<br>';
echo 'Задание 5';
echo '<br>';



?>

<h4>Сколько будет 2+2?</h4>
<form action="hw1_post.php" method="post">
<input type="radio" name="one">1
<input type="radio" name="two">2
<input type="radio" name="four">4
<input type="radio" name="five">5

<h4>Выбите мужские имена</h4>
    <input type="checkbox" name="roman">Роман
    <input type="checkbox" name="svetlana">Светлана
    <input type="checkbox" name="oleg">Олег
    <input type="checkbox" name="dasha">Даша

    <h4>Введите число месяца Май</h4>
    <input type="text" name="mount">
    <br>
    <br>
<button type="submit" name="sendbtn">отправить ответы</button>
</form>
<?php
echo 'Задание 6';
echo '<br>';

$background_color='blue';

$color='red';
$width='100px';
$height='100px';
$tag='background-color:'.$background_color.';color:'.$color.';width:'.$width.';height:'.$height.';';
echo 'background-color:blue';
echo '<br>';
echo 'color:red';
echo '<br>';
echo 'width:100px';
echo '<br>';
echo 'height:100px';
echo '<br>';
echo "<div style='$tag'>Hello</div>"
?>
</body>
</html>