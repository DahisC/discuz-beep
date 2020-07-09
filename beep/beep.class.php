<!-- 插件的進入點，並在 global_header 中渲染模板 -->

<?php
    if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
    }

    $tpl = include '/template/beep.htm.php';

    class plugin_beep { 

        function global_header() {
            return $tpl;
        }
    }
?>

