<?php

//function addNumbersColor($n1,$n2,$color='blue'){
//    return "Sum is: <span style=color:$color;>".($n1+$n2)."</span>";
//}
// echo addNumbersColor(50,70,'green');
//echo '<hr>';
//echo addNumbersColor(50,70);
//echo '<hr>';

//пример с global , позволяет внутри функции работать с глобальной переменной


//function numbersFunc($number3){
//    global $n3;
// $number3+=10;
// echo $number3;
// $n3*=2;
//}
//$n3=5;
//numbersFunc($n3);
//echo '<hr>';
//echo $n3;

//пример без указателя
//function nubersFunc($n4){
//   $n4+=5;
//   echo $n4;
//}
//$n4=10;
//nubersFunc($n4);
//echo '<hr>';
//echo $n4;

//пример c указателем
//указатель - обозначается в РНР символом & и позволяет ссылаться на один и тот же участок в оперативной памяти
//function nubersFunc(&$n4){
//    $n4+=5;
//    echo $n4;
//}
//$n4=10;
//nubersFunc($n4);
//echo '<hr>';
//echo $n4;


// вызов функции из другого файла( скрипта)
function outFunc($text){
    return "Our Text = $text";
}