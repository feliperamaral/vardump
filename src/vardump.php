<?php

function vardump($var, $die = false){

    ob_start();
    var_dump($var);
    $output = ob_get_clean();

    $typesFormats = array(
        'array'    => '<b style="color: #888a85">$1</b>',
        'boolean'  => '<small style="color: #75507b">$1</small>',
        'bool'     => '<small style="color: #75507b">$1</small>',
        'float'    => '<small style="color: #f57900">$1</small>',
        'double'   => '<small style="color: #f57900">$1</small>',
        
        
        'int'      => '<small style="color: #4e9a06">$1</small>',
        'integer'  => '<small style="color: #4e9a06">$1</small>',
        
        'null'     => '<font color="#3465a4">$1</font>',
        'NULL'     => '<font color="#3465a4">$1</font>',
        'object'   => '<b>$1</b>',
        'object'   => '<b>$1</b>',
        'resource' => '<b style="color: #2e3436">$1</b>',
        'string'   => '<small style="color: #cc0000">$1</small>',
    );

    $type = gettype($var);

    if(!in_array($type, array('array', 'object'))){

        echo '<pre>';
        echo str_replace('$1', htmlentities($output), $typesFormats[$type]);
        echo '</pre>';

        if($die){
            die;
        }
        return;
    }
    
    $output = preg_replace(array(
                    '/\]\=\>\n(\s+)/m',
                    '/^(\s+)/m'
                ), array(
                    '] => ',
                    '\1\1'
                ), $output);

    preg_match_all("/^.* =>/m", $output, $matches);
    
    $max = 0;
    foreach($matches[0] as $match){
        $size = strlen($match);
        if($size > $max){
            $max = $size;
        }
    }

    $outputLines = explode(PHP_EOL, $output);

    

    foreach($outputLines as $key => $line){
        if(($pos = strpos($line, '=>')) !== false){

            $toReplace =
                ' <span style="opacity:0.2">'
                    . str_repeat('-', $max - $pos)
                . '</span>'
                . ' => ';
            $line = str_replace(' => ', $toReplace, $line);

            preg_match('/=> ([a-zA-Z]+)/', $line, $typeMatch);
            
            if(isset($typesFormats[$typeMatch[1]])){
                $format = $typesFormats[$typeMatch[1]];
                preg_match('/ => ([a-zA-Z]+)/', $line, $m);
                $line = preg_replace('/ => ([a-zA-Z]+[a-zA-Z0-9()]*)/', ' => ' . $format , $line);
            }

            $outputLines[$key] = $line;
        }
    }

    echo '<pre>';
    echo implode(PHP_EOL, $outputLines);
    echo '</pre>';

    if($die){
        die;
    }
}