<?php
session_start();
$date = date("Y-m-d");
setcookie("date", $date);
$_SESSION['session_beginNewTime'] = time();
if (empty($_SESSION['session_beginOldTime'])) {
    $_SESSION['session_beginOldTime'] = $_SESSION['session_beginNewTime'];
}
if (time() - $_SESSION['session_beginOldTime'] < 60 * 60) {
    $_SESSION['session_beginOldTime'] = $_SESSION['session_beginNewTime'];
} else {
    session_destroy();
    session_unset();
    $_SESSION = array();
    echo "Session nicht mehr gültig!";
    $_SESSION['session_beginOldTime'] = '';
}
        require_once 'app/init.php';
        $app = new App();
        ?>
