<?php
    if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
    }

    $tpl = include 'beep.tpl.php';

class plugin_beep { 

    function global_header() {
        return $tpl;
    }
}

?>