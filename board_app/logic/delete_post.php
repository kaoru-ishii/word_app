<?php

require_once dirname(__DIR__) . '/logic./dbconnection.php';

$postId = $_POST['postId'];

// print_r($postID);

//投稿機能　ポスト内容をpostsテーブルに書き込む(Create)
$sql = "DELETE FROM posts WHERE id = :id ";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':id', $postId);
$stmt->execute();

$error = $stmt->errorInfo();

if($error[2]) {
    echo $error[2];
} else {
    header('Location:../view/index.php');
}

?>