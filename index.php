<?php

define('DS', DIRECTORY_SEPARATOR);
$DIR_CORE = dirname(__FILE__);
define('DIR_CORE', $DIR_CORE);



include_once DIR_CORE . DS . "routes.php";

echo ("TRESGE  AAA 22123");

Routes::routes();


