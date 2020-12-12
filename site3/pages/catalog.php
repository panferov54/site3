<h3>Каталог товаров</h3>

<?php
//var_dump(Item::getItems());
echo '<div id="result" class="row justify-content-between" >';
$items=Item::getItems();
foreach ($items as $item){
    $item->drawItem();
}
echo '</div>';

?>

<script>
    function createCookie(ruser,id){


        console.log(ruser);
        $.cookie(ruser,id,{expires:2,path:'/'});
    }

</script>
