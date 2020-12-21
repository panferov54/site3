<?php
//проверка на нажата ли кнопка
if (isset($_POST['send']) && $_POST['pass']){
    echo "You are welcome {$_POST['name']},your password is {$_POST['pass']},email {$_POST['email']}";
}else{
    echo '<h2>NO DATA</h2>';
}
