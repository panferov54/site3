<?php
if (!isset($_COOKIE['counter'])){
    setcookie("counter","1",time()+60*60*24,"/","",0);
}else{
    $_COOKIE['counter']+=1;
    setcookie("counter",$_COOKIE['counter'],time()+60*60*24,"/","",0);

}

    echo "counter is {$_COOKIE['counter']}";
?>

<a href="cookie.php">Increase counter</a>
