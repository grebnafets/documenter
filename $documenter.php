<?php
define('THIS', 'docum');
?><!DOCTYPE html>
<html>
        <head>
                <title></title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <style>
                        <?php echo file_get_contents('$assets/css/' . THIS . '.css'); ?>
                </style>
        </head>
        <body id="artargi">
                <div id="document"></div>
                <script id="scriptid" type="text/document">
                        <?php echo file_get_contents('-developer/xjs/documenter/main.js'); ?>
                </script>
                
                <script type="text/javascript">
                        var DATA = <?php echo file_get_contents('$assets/json/' . THIS . '.json'); ?>;
                </script>
                
                <?php echo file_get_contents('$assets/jst/' . THIS . '.jst'); ?>
                
                <script type="text/javascript">
                        <?php echo file_get_contents('$assets/js/' . THIS . '.js'); ?>
                </script>
        </body>
</html>