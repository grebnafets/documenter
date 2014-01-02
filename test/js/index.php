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
                <div id='image_p'></div>
                <div id='assignop_p'></div>
                <div id='bitwise_p'></div>
                <div id='logic_p'></div>
                <div id='arithmeop_p'></div>
                <div id='int_p'></div>
                <div id='native_p'></div>
                <div id='ECMAstandard_p'></div>
                <div id='structure_p'></div>
                <div id='comment_p'></div>
                <div id='string_p'></div>
                <div id='dom_api_p'></div>
                <div id='firebug_p'></div>
                
                <br />
                <hr />
                <hr />
                <hr />
                <br />
                
                <div id="image"></div>
                <div id="image_s"></div>
                <hr />
                <div id="assignop"></div>
                <div id="assignop_s"></div>
                <hr />
                <div id="bitwise"></div>
                <div id="bitwise_s"></div>
                <hr />
                <div id="logic"></div>
                <div id="logic_s"></div>
                <hr />
                <div id="arithmeop"></div>
                <div id="arithmeop_s"></div>
                <hr />
                <div id="int"></div>
                <div id="int_s"></div>
                <hr />
                <div id="native"></div>
                <div id="native_s"></div>
                <hr />
                <div id="ECMAstandard"></div>
                <div id="ECMAstandard_s"></div>
                <hr />
                <div id="structure"></div>
                <div id="structure_s"></div>
                <hr />
                <div id="comment"></div>
                <div id="comment_s"></div>
                <hr />
                <div id="string"></div>
                <div id="string_s"></div>
                <hr />
                <div id="dom_api"></div>
                <div id="dom_api_s"></div>
                <hr />
                <div id="firebug"></div>
                <div id="firebug_s"></div>
                <hr />
                <div id="firebug"></div>
                <div id="firebug_s"></div>
                
                <!-- codes:start -->
                <script id="image_c" type="text/code">
                        <?php echo file_get_contents('image.js'); ?>
                </script>
                
                <script id="assignop_c" type="text/code">
                        <?php echo file_get_contents('assignop.js'); ?>
                </script>
                
                <script id="bitwise_c" type="text/code">
                        <?php echo file_get_contents('bitwise.js'); ?>
                </script>
                
                <script id="logic_c" type="text/code">
                        <?php echo file_get_contents('logic.js'); ?>
                </script>
                
                <script id="arithmeop_c" type="text/code">
                        <?php echo file_get_contents('arithmeop.js'); ?>
                </script>
                
                <script id="int_c" type="text/code">
                        <?php echo file_get_contents('int.js'); ?>
                </script>
                
                <script id="native_c" type="text/code">
                        <?php echo file_get_contents('native.js'); ?>
                </script>
                
                <script id="ECMAstandard_c" type="text/code">
                        <?php echo file_get_contents('ECMAstandard.js'); ?>
                </script>
                
                <script id="structure_c" type="text/code">
                        <?php echo file_get_contents('structure.js'); ?>
                </script>
                
                <script id="comment_c" type="text/code">
                        <?php echo file_get_contents('comment.js'); ?>
                </script>
                
                <script id="string_c" type="text/code">
                        <?php echo file_get_contents('string.js'); ?>
                </script>
                
                <script id="dom_api_c" type="text/code">
                        <?php echo file_get_contents('dom_api.js'); ?>
                </script>
                
                <script id="firebug_c" type="text/code">
                        <?php echo file_get_contents('firebug.js'); ?>
                </script>
                <!-- codes:end -->
                
                <script type="text/javascript">
                        var DATA = <?php echo file_get_contents(TO_ASSETS . 'json/' . THIS . '.json'); ?>;
                </script>
                
                <?php echo file_get_contents(TO_ASSETS . 'jst/' . THIS . '.jst'); ?>
                
                <script type="text/javascript">
                        <?php echo file_get_contents(TO_ASSETS . 'js/' . THIS . '.js'); ?>
                </script>
                <script>
                        function add_test(name, valid_signeture) {
                                'use strict';
                                var code, signeture, parsed;
                                signeture = name + '_s';
                                code   = document.getElementById(name + '_c').innerHTML;
                                parsed = Docm.parse.code('js', code);
                                document.getElementById(name).innerHTML = parsed;
                                signeture = Sha1.hash(parsed);
                                document.getElementById(name + '_s').innerHTML = signeture;
                                
                                if (valid_signeture === signeture) {
                                        document.getElementById(name + '_p').innerHTML = "<span style='display:inline-block;width:200px;'>" + name + "</span><span style='display:inline-block;color:green;width:100px;'>| PASS</span><hr />";
                                } else {
                                        document.getElementById(name + '_p').innerHTML = "<span style='display:inline-block;width:200px;'>" + name + "</span><span style='display:inline-block;color:red;width:100px;'>| FAIL</span><hr />";
                                }
                        }
                        add_test('image', '80c4c7e44b6e44d1dd46ed5de384e1ee42c6d60b');
                        add_test('assignop', '3550f8dee8d473a8fc88fadfc4f6bfadbe137db4');
                        add_test('bitwise', '49a7a53415ff0ec52d70c6e530b0275015cc0c37');
                        add_test('logic', '6c956360a722bd56abd2915989d9a02742f227e3');
                        add_test('arithmeop', '9b748d4ea1ff74285aad026de8396ba386a491d0');
                        add_test('int', '5a020b1f25b718c17656bf4f00da0a214efcdb68');
                        add_test('native', 'c347782b4e34d412b11b4b075a5fe802c9da4cd0');
                        add_test('ECMAstandard', '537aa65c68fd07859513d17f4655abbfac53986c');
                        add_test('structure', '9b3916a3a03cc6cb759d111de761d9ec72bb65d0');
                        add_test('comment', '7f653566ebb1b511586c599c1f3cc0ee8534ee55');
                        add_test('string', '9aab9d8a2516a0c86bafbbc88ce4356a4882ba67');
                        add_test('dom_api', '5b32facbbdf1ebb12f54ffb8d0a030a3a3d11b6a');
                        add_test('firebug', 'd2861465c3bdf59fb8ff05abf26e1f129bcef1fa');
                </script>
        </body>
</html>