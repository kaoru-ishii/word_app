<?php

//ブラウザにPHPエラーを出力する場合
ini_set('display_errors', 1);

require_once dirname(__DIR__) . '/logic/dbconnection.php';

//DBからpost内容をReadする
// $sql = "SELECT posts.id, posts.user_id, posts.post, posts.created_at, posts.updated_at, users.name FROM posts INNER JOIN users ON posts. user_id = users.id";
$sql = "SELECT p.id, p.user_id, p.post, p.created_at, p.updated_at, u.name FROM posts AS p INNER JOIN users AS u ON p.user_id = u.id";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll();

// print_r($posts);

// foreach ($posts as $post) {
//     echo "<br>";
//     print_r($post);
//     echo "<br>";
// }

?>