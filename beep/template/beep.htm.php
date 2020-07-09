<!-- 取出後台設置的變數 pollingInterval -->

<?php
    if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
    }

    $pollingInterval = $_G['cache']['plugin']['beep']['pollingInterval'];
    $beep_settings = C::t('#beep#beep') -> fetch($_G['uid']);
?>

<script>
    if (<?php echo $_G['uid'] ?> && <?php echo $beep_settings['disabled'] != 1 ?>) polling(); // 登入才開啟通知功能

    function polling() {
        let count = 1;
        const frequency = "<?php echo $beep_settings['frequency']; ?>";
        const limited = "<?php echo $beep_settings['limited']; ?>";
        const sound = "<?php echo $beep_settings['sound']; ?>";

        const interval = setInterval(() => {
            if (limited == 1 && count >= frequency) {
                clearInterval(interval);
            }

            const ajax = new XMLHttpRequest();
            ajax.responseType = "json";
            ajax.open("GET", "plugin.php?id=beep:check");
            ajax.send();

            ajax.onreadystatechange = () => {
                if (ajax.response == 1) {
                    const beepSound = document.getElementById("beepSound");
                    const pm_ntc = document.getElementById("pm_ntc")
                    noticeTitle(); // 頁面標題閃爍
                    playSound(sound);
                    pm_ntc.classList.add('new'); // 新消息圖示
                    count = count + 1; // 提醒次數 +1
                }
            }
        }, <?php echo $pollingInterval * 1000; ?>)
    }

    function playSound(soundName) {
        const sound_url =
        "https://raw.githubusercontent.com/DahisC/test/master/" +
        soundName +
        ".mp3";
        const beep_sound = new Audio(sound_url);
        beep_sound.play();
    }
</script>

