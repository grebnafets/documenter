<?php
define('TO_ROOT', '../../');
define('THIS', 'docum');
define('TO_ASSETS', TO_ROOT . '$assets/');
define('SHA1_PATH', '../sha1.js');
?><!DOCTYPE html>
<html>
        <head>
                <title>Test javascript</title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <style>
                        <?php echo file_get_contents(TO_ASSETS . 'css/' . THIS . '.css'); ?>
                </style>
                <script type="text/javascript" src="<?php echo SHA1_PATH; ?>"></script>
        </head>
        <body id="artargi">
                <div id="document"></div>
                <div id="signeture"></div>
                <script id="scriptid" type="text/document">
                        <?php echo file_get_contents('test.js'); ?>
                </script>
                
                <script type="text/javascript">
                        var DATA = <?php echo file_get_contents(TO_ASSETS . 'json/' . THIS . '.json'); ?>;
                </script>
                
                <?php echo file_get_contents(TO_ASSETS . 'jst/' . THIS . '.jst'); ?>
                
                <script type="text/javascript">
                        <?php echo file_get_contents(TO_ASSETS . 'js/' . THIS . '.js'); ?>
                </script>
                <script>
                        var PARSEDCODE = document.getElementById("document").innerHTML;
                        document.getElementById("signeture").innerHTML = Sha1.hash(PARSEDCODE);
                </script>
        </body>
</html>