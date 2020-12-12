<?php
$check=0;
if (isset($_POST['sendbtn'])){
    if(isset($_POST['four'])){
        $check+=1;
    }
    if(isset($_POST['roman'])&&isset($_POST['oleg'])){
        $check+=1;
    }
    if(isset($_POST['mount'])&&$_POST['mount']==5){
        $check+=1;
    }
    echo " Правильных ответов у вас - $check";
}else{
    echo '<h2>NO DATA</h2>';
}