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

    // echo C::t('beep');
    $user = C::t('common_member') -> fetch($_G['uid']);

    print_r($user['email']);
    echo (C::t('common_member'))

?>