<?php

session_start();

$username = $_SESSION['name'];

if (isset($_SESSION['id'])) { // ログイン時
    $msg = '掲示板アプリへようこそ！' . $username . 'さん';
} else { // 未ログイン時
    header('Location:../view/login.php');
    exit();
}

?>
