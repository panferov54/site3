<h3>Каталог товаров</h3>
<div id="productAdd" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title text-info">Товар добавлен в корзину</h4>
            </div>


                <button type="button" class="btn btn-default" data-dismiss="modal">х</button>

        </div>

    </div>
</div>
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
