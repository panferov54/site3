<?php
//способы подключения другого файла
//require и require_once позволяют подключить другой скрипт и пользоваться его возможностями
require_once ('functions.php');
include_once ('functions.php');
echo outFunc('hello world');