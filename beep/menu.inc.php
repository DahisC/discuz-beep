<?php

    // 測試中

    if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
    }

    $uid = $_G['uid'];

    $payload = json_decode(file_get_contents('php://input'), true);
    $disabled = $payload['disabled'];
    $sound = $payload['sound'];
    $limited = $payload['limited'];
    $frequency = $payload['frequency'];

    $db = C::t('#beep#beep') -> fetch($_G['uid']);

    if (empty($db)) { // 如果使用者未設定，則新增欄位到資料表中
        echo 1;
    } else { // 如果已設定，則修改欄位
        echo 2;
    }

?>