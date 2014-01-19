<?php
/*
 * Author: Greb Nafets | Dnaleci
 */
///*
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//*/

/*
 * Table of contents:
 * 
 * 0. Standard functions
 * 1. Error messages
 * 2. Query string
 * 3. Check if xbootstrap file exists
 * 4. Include paths and xbootstrap file
 * 5. function bundle: function that bundles files together.
 * 6. function separator: useless function for decoration...
 * 7. Run bundle.
 */

// 0
function jto_array(&$json)
{
        $json = json_decode($json, true);
}

function ato_json(&$arr)
{
        $arr = json_encode($arr);
}

function url_exists($url) {
        $url_exists = true;
        $headers = get_headers($url);
        if(strpos($headers[0], '200') === false )
                $url_exists = false;
        return $url_exists;
                
}

// 1
function error_fileMissing($type, $path) {
        $msg = '<span style="color:red">Error: </span>' 
                . "<b>$type.php</b> "
                . ' does not exist.'
                . ' PATH: '
                . $path
                . '<br />';
        return $msg;
}

// 2
if (!isset($_GET['t']) && !isset($_GET['a']) && !isset($_GET['s']))
        exit();

$type     = $_GET['t']; // This is set via makefile.php
$alias    = $_GET['a'];
$scope    = $_GET['s'];

// 3
$filename = "xbootstrap/$scope.php";
if (!file_exists($filename))
        exit("xbootstrap file doesn't not exist");

// 4
include 'path.php';
include $filename;

// 5
function bundle($type, $alias)
{
        include 'ADD.php';
        $add  = new ADD();
        $list = $type();
        
        foreach ($list as $item) {
                $add->{$type}($item);
        }
        
        $i        = 0;
        $len      = count($add->{"_$type"});
        $contents = '';
        
        foreach ($add->{"_$type"} as $name => $path) {
                $tmp_path = BASEURL . $path;
                if ($type === 'json') {
                        if (url_exists($tmp_path)) {
                                $contents[$name] = file_get_contents($tmp_path);
                                jto_array($contents[$name]);
                        } else {
                                echo error_fileMissing($type, $tmp_path);
                        }
                } else {
                        if (url_exists($tmp_path)) {
                                $contents .= file_get_contents($tmp_path);
                        } else {
                                echo error_fileMissing($type, $tmp_path);
                        }
                }
                $i = $i + 1;
                
                // remove this if you don't want decoration in your bundle..
                if($i < $len && $type !== 'jst' && $type !== 'json') {
                       $contents .= separator();
                }
                // remove end
        }
        
        if ($type === 'json')
                ato_json ($contents);
        
        if (file_put_contents("../_assets/$type/$alias.$type", $contents)) {
                echo "$type/$alias.$type bundling success<br /><hr />";
        } else {
                echo "$type/$alias.$type bundling fail<br /><hr />";
        }
}

// 6 (remove this if you want)
function separator()
{
        $string  = "\n";
        $string .= "\n";
        $string .= "/*------------------------------------------------------*/";
        $string .= "\n";
        $string .= "\n";
        return $string;
}

// 7
bundle($type, $alias);