<?php

$stdClass = new stdClass;
$stdClass->bool = true;
$stdClass->int = 154;
$stdClass->float = 15.4;
$stdClass->string = 'string value';
$stdClass->array = range('A', 'F');
$stdClass->array[] = false;

$stdClass->resource = fopen(__FILE__, 'r');
$stdClass->null = null;

return array(
    true,
    1,
    1.1,
    'string',
    array(),
    $stdClass,
    null,
    function(){},
    fopen(__FILE__, 'r')
);