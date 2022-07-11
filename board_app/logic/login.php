<?php

require_once dirname(__DIR__) . '/logic/dbconnection.php';
require_once dirname(__DIR__) . '/logic/helper.php';

session_start();

//フォームから渡されたデータを変数に代入
$email = $_POST['email'];
$password = $_POST['password'];

//バリデーション
isEmpty($email, 'メールアドレスを入力してください！');

isEmpty($password, 'パスワードを入力してください！');

//ログイン機能
$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$user = $stmt->fetch();

//指定したハッシュがパスワードにマッチしているかチェックする
if(password_verify($password, $user['password'])) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    //ログインページに遷移
    header('Location:../view/index.php');
} else {
    echo 'メールアドレスもしくはパスワードが間違っています。';
}

?>