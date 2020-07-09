<!-- 取出後台設置的變數 pollingInterval -->

<?php
    if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
    }

    $pollingInterval = $_G['cache']['plugin']['beep']['pollingInterval'];
?>

<audio id="beepSound" src="https://raw.githubusercontent.com/DahisC/test/master/beep.mp3"></audio>
<script>
    if (<?php echo $_G['uid'] ?>) polling(); // 登入才開啟通知功能

    function polling() {
        setInterval(() => {
            const ajax = new XMLHttpRequest();
            ajax.responseType = "json";
            ajax.open("GET", "plugin.php?id=beep:check");
            ajax.send();

            ajax.onreadystatechange = () => {
                if (ajax.response == 1) {
                    const beepSound = document.getElementById("beepSound");
                    const pm_ntc = document.getElementById("pm_ntc")
                    noticeTitle(); // 頁面標題閃爍
                    beepSound.play(); // 音效提示
                    pm_ntc.classList.add('new'); // 新消息圖示
                }
            }
        }, "<?php echo $pollingInterval * 1000; ?>")
    }
</script>

