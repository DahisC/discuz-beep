<?php

    if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
    }

    // 於此處撈出使用者設定，給 /template/menu.htm 使用
    // 不需要判定使用者的登入情況，因為需要登入才能進到設定畫面
    $beep_settings = C::t('#beep#beep') -> fetch($_G['uid']);

?>