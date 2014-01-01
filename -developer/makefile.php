<?php
/*
 * Author: Greb Nafets | Dnaleci
 */

/*
 * How to use: 
 * Add this line to the end of your url when opening this file and see for yourself:
 *      ?s=documenter&a=docum
 * Remember to add right permissions to project files.
 */

///*
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//*/s
include 'path.php';

if (!isset($_GET['s']) && !isset($_GET['a']))
        exit();

$scope = $_GET['s'];
$alias = $_GET['a'];

echo file_get_contents(CC . "?t=js&s=$scope&a=$alias");
echo file_get_contents(CC . "?t=css&s=$scope&a=$alias");
echo file_get_contents(CC . "?t=jst&s=$scope&a=$alias");
echo file_get_contents(CC . "?t=json&s=$scope&a=$alias");

ob_start();
?><!DOCTYPE html>
<html>
        <head>
                <title>Documenter</title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <style>
                        /* You might want to change your stylesheet.*/
                        <?php
                        $bundle = '../$assets/css/' . $alias . '.css';
                        $min    = '../$assets/css/' . $alias . '-min.css';
                                if (file_exists($min)) {
                                        echo file_get_contents($min);
                                } else {
                                        echo file_get_contents($bundle);
                                }
                        ?>
                        
                </style>
        </head>
        <body id="artargi">
                <div id="document"></div>
                <script id="scriptid" type="text/document">
                        /*
                                include your file here
                        */
                </script>
                
                <script type="text/javascript">
                        var DATA = <?php echo file_get_contents('../$assets/json/' . $alias . '.json'); ?>;
                </script>
                
                <?php /*echo file_get_contents('../$assets/jst/' . $alias . '.jst');*/ ?>
                
                <script type="text/javascript">
                        <?php
                        $bundle = '../$assets/js/' . $alias . '.js';
                        $min    = '../$assets/js/' . $alias . '-min.js';
                                if (file_exists($min)) {
                                        echo file_get_contents($min);
                                } else {
                                        echo file_get_contents($bundle);
                                }
                        ?>
                        
                </script>
        </body>
</html>
<?php
$html = ob_get_clean();
if (file_put_contents('xjs/documenter/docm.php', $html)) {
        echo 'documenter docm.php write success';
} else {
        echo 'could not write docm.php documenter';
}