<?php

// htmlspecialchars関数を通して値を返す
function spChars(string $str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// 文字未入力のバリデーション
function isEmpty(string $str, string $msg)
{
    if (empty($str)) {
        echo $msg;
        exit();
    }
}

?>