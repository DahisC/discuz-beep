<!-- 回傳使用者是否有收到新訊息，須直接向資料庫請求而不能透過 $_G -->

<?php
    if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
    }
    
    loaducenter();
    $ucnewpm = intval(uc_pm_checknew($_G['uid']));

    echo $ucnewpm;
?>