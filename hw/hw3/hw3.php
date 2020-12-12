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
echo "Задание 1";
$min =2;
$max=99;
echo "<p style='width: 500px'>";
for ($i=0;$i<100;$i++){
    echo mt_rand(2, 99);
    echo " ";
}
echo "</p>";

echo "min $min <br>";
echo "max $max <br>";
echo "<hr>";
echo "Задание 2";
echo "<br>";
$dir = 'images/';
$cols = 4;
$files = scandir($dir);
echo "<table>";
$k = 0;
for ($i = 0; $i < count($files); $i++) {
    if (($files[$i] != ".") && ($files[$i] != "..")) {
        if ($k % $cols == 0) echo "<tr>";
        echo "<td>";
        $path = $dir.$files[$i];
        echo "<a href='$path'>";
        echo "<img src='$path' alt='' width='100' />";
        echo "</a>";
        echo "</td>";
        if ((($k + 1) % $cols == 0) || (($i + 1) == count($files))) echo "</tr>";
        $k++;
    }
}
echo "</table>";
echo "<hr>";
echo "Задание 3";
echo "<br>";
$cols=10;
$rows=10;
$tr=1;

echo "<table border='1'>" ;

while($tr<=$rows){
    echo "<tr>" ;
    $td=1;
    while ($td<=$cols){
        echo "<td>".$tr*$td."</td>";
        $td++;
    }
    echo "</tr>";
    $tr++ ;
}
echo "</table>" ;

echo "<hr>";
echo "Задание 4";
echo "<br>";
$cols=4;
$rows=20;
$tr=1;



echo "<table border='1'>" ;
echo "<tr>" ;
echo "<td style='background-color: red'>Year</td>";
echo "<td style='background-color: red'>Summ start</td>";
echo "<td style='background-color: red'>Summ end</td>";
echo "<td style='background-color: red'>Profit</td>";
echo "</tr>" ;
$nal=300;
$proc=$nal*(20/100);
$summ=$nal+$proc;
for ($i=1;$i<=20;$i++){

    echo "<tr style='background-color: gray;color: white'>" ;
    echo "<td>$i</td>";

    echo "<td>".$nal."</td>";

    echo "<td>".(round($nal+($nal*(20/100)),2))."</td>";

    echo "<td>".round((($nal+($nal*(20/100)))-$nal),2)."</td>";

    echo "</tr>" ;

    $nal=round($nal+($nal*(20/100)),2);
}

echo "</table>" ;

echo "<hr>";
echo "Задание 5";
echo "<br>";
$number=347689;

echo "<h1 style='color: red'>$number </h1>";
echo "<h1 style='color: green'>".strrev($number). "</h1>";


echo "<hr>";
echo "Задание 6";
echo "<br>";
$number2=5493256;
echo "<h1>Number is $number2</h1>";
$exp=str_split($number2);
echo "<h2>Digits in the number:";
for($i=0;$i<count($exp);$i++){
    echo "$exp[$i],";


}
echo "</h2>";
echo "<p>";
echo "Count of Digits:";
echo count($exp);
echo ",Max: ";
$maxN=0;
for($i=0;$i<count($exp);$i++){
  if ($exp[$i]>$maxN){
      $maxN=$exp[$i];
  }

}
echo $maxN;
echo ",Min: ";
$minN=$maxN;
for($i=0;$i<count($exp);$i++){
    if ($exp[$i]<$minN){
        $minN=$exp[$i];
    }

}
echo $minN;
echo ",Summ: ";
$summ=0;
for($i=0;$i<count($exp);$i++){
   $summ+=$exp[$i];

}
echo  $summ;
echo ",AVG: ";
echo round(array_sum($exp)/count($exp),2);
echo "</p>";
?>
</body>
</html>