<?php
require '../vendor/autoload.php';
$vars = require '_vars.php';

foreach($vars as $var){
    echo '<pre>';
    print_r($var);
    echo '<pre>';
}