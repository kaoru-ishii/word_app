<?php

require_once dirname(__DIR__) . '/logic/dbconnection.php';
require_once dirname(__DIR__) . '/logic/helper.php';

session_start();

//フォームから渡されたデータ
$post = $_POST['post'];

//未入力バリデーション
isEmpty($post, '投稿内容を入力してください！');

//文字数のバリデーション
if(200 < mb_strlen($post)) {
    echo '文字数は２００文字以内にしてください！';
    exit();
}

//投稿機能　ポスト内容をpostsテーブルに書き込む(Create)
$userId = $_SESSION['id'];

$sql = "INSERT INTO posts(user_id, post) VALUES (:user_id, :post)";
$stmt = $dbh->prepare($sql);// SQLのサニタイズ
$stmt->bindValue(':user_id', $userId);
$stmt->bindValue(':post', $post); 
$stmt->execute();

$error = $stmt->errorInfo();

if($error[2]) {
    echo $error[2];
} else {
    header('Location:../view/index.php');
}

?>