<?php

require_once dirname(__DIR__) . '/logic/dbconnection.php';
require_once dirname(__DIR__) . '/logic/helper.php';

// フォームから渡されたデータを変数に代入
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

isEmpty($name, '名前を入力してください');

isEmpty($email, 'メールアドレスを入力してください！');

isEmpty($password, 'パスワードを入力してください！');

// フォームに入力されたemailがすでに登録されていないかをチェックし、なければDBに登録し、ログインページに遷移する
$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $dbh->prepare($sql); //SQLのサニタイズ
$stmt->bindValue(':email', $email);
$stmt->execute();
$user = $stmt->fetch();

if ($user['email'] === $email) {
    echo '同じメールアドレスが存在しています';
    exit();
}

//ユーザー登録機能
$sql = "INSERT INTO users(name, email, password) VALUE (:name, :email, :password)";
$stmt = $dbh->prepare($sql); //SQLのサニタイズ
$stmt->bindValue(':name', $name);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', $password);
$stmt->execute();
$error = $stmt->errorInfo;

//エラーが発生している場合、配列のインデックス2がNULLではないので、以下のように動く
if ($error[2]) {
    echo $error[2];
} else {
    //ログインページに遷移
    header('Location:../view/login.php');
}

?>