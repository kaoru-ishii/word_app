<?php

session_start();
$_SESSION = array(); //セッションの中身を全て削除する
session_destroy(); //セッションを破壊する



?>