<?php
    if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
    }

    $pollingInterval = $_G['cache']['plugin']['beep']['pollingInterval'];
?>

<audio id="beep" src="https://raw.githubusercontent.com/DahisC/test/master/beep.mp3"></audio>
<script>
    const beepSound = document.getElementById("beep");
    setInterval(() => {
        const ajax = new XMLHttpRequest();
        ajax.responseType = "json";
        ajax.open("GET", "plugin.php?id=beep:check");
        ajax.send();

        ajax.onreadystatechange = () => {
            if (ajax.response == 1) {
                noticeTitle();
                beepSound.play();
            }
        }
    }, "<?php echo $pollingInterval * 1000; ?>")
</script>

