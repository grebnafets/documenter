<?php
/*
 * Don't be scared to change anything here, you can test the output of this file
 * directly.
 * 
 * Node:
 * If you want to automate this part, then remember that you can have
 * have a multi-dimensional structure. Have fun :-)
 */
function to_array(&$arr) 
{
        $arr = json_decode($arr, true);
}

function to_json(&$json)
{
        $json = json_encode($json);
}

function getj($name)
{
        return file_get_contents("$name.json");
}

$_1 = getj('js');
$_2 = getj('php');

to_array($_1);
to_array($_2);

$files = array(
        'js'  => $_1,
        'php' => $_2
);

to_json($files);

echo $files;