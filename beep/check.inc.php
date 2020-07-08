<?php
    if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
    }
    
    loaducenter();
    $ucnewpm = intval(uc_pm_checknew($_G['uid']));

    echo $ucnewpm;
?>