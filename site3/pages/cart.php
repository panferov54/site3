<h4>Корзина</h4>
<?php
echo '<form action="index.php?page=2" method="post">';
$total=0;
foreach ($_COOKIE as $k=>$v){
    if(substr($k,0,strpos($k,"_"))==='cart'){
       $id=substr($k,strpos($k,"_")+1);
       $item=Item::fromDb($id);
        $total+=$item->pricesale;
        $item->drawItemCart();
    }


}
echo '<hr>';
echo "<span class='ml-5 text-primary'>Total Price: $total $</span>";
echo "<button type='submit' class='btn  btn-primary btn-lg ml-5' name='suborder' onclick=eraseCookie('cart')>Отправить заказ</button>";

echo '</form>';


//обработчик для оформления заказов
if(isset($_POST['suborder'])){
    $id_result=[];
    foreach ($_COOKIE as $k =>$v){
       if(substr($k,0,strpos($k,"_"))==='cart'){
           $id= substr($k,strpos($k,"_")+1);
           $item=Item::fromDb($id);
           array_push($id_result,$item->sale());
       }
    }

    Item::SMTP($id_result);
}
?>
<script>
    function eraseCookie(ruser){
        $.removeCookie(ruser,{path:'/'});
    }


</script>
