<?php
$name=strtolower($_GET['name']);
$names=["mary","mike","maksim","maria","mikhail","masha"];


foreach ($names as $n){
    if(substr($n,0,strlen($name))===$name){
        $response.="<h4>$n</h4>";
    }
}
echo $response;//будет возращено в блок responseText