<?php

    // 測試中

    if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
    }

    $uid = $_G['uid'];

    $payload = json_decode(file_get_contents('php://input'), true);
    $disabled = $payload['disabled'];
    $limited = $payload['limited'];
    $frequency = $payload['frequency'];
    $sound = $payload['sound'];

    // 

    $db = C::t('#beep#beep') -> fetch($_G['uid']);

    if (empty($db)) { // 如果使用者未設定，則新增欄位到資料表中
        C::t('#beep#beep') -> insert(array(
            'uid' => $_G['uid'],
            'disabled' => $disabled,
            'limited' => $limited,
            'frequency' => $frequency,
            'sound' => $sound,
        ));
    } else { // 如果已設定，則修改欄位
        C::t('#beep#beep') -> update($_G['uid'], array(
            'disabled' => $disabled,
            'limited' => $limited,
            'frequency' => $frequency,
            'sound' => $sound
        ));
    }

?>