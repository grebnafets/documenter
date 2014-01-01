<?php
/*
 * Author: Greb Nafets | Dnaleci
 */
class ADD {    
        public $_css  = array();
        public $_html = array();
        public $_js   = array();
        public $_jst  = array();
        public $_json = array();

        public function css($name){
            if(empty($this->_css[$name]))
                    $this->_css[$name] = 'xcss/'.$name.'/css.php';
        }
        
        public function js($name){
            if(empty($this->_js[$name]))
                    $this->_js[$name] = 'xjs/'.$name.'/js.php';
        }
        
        public function jst($name){
            if(empty($this->_jst[$name]))
                    $this->_jst[$name] = 'xjst/'.$name.'/jst.php';
        }
        
        public function json($name){
            if(empty($this->_json[$name]))
                    $this->_json[$name] = 'xjson/'.$name.'/json.php';
        }
        
        public function jsmin($name){
            if(empty($this->_js[$name]))
                    $this->_js[$name] = 'xjsmin/'.$name.'/jsmin.php';
        }
}