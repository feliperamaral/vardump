<?php
require '../vendor/autoload.php';
$vars = require '_vars.php';

foreach($vars as $var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}