<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規会員登録</title>

    <link rel="stylesheet" href="../assets/global.css">
</head>

<body>
    <div class="container">
        <div class="main">
            <h1 class="title">掲示板アプリ</h1>
            <h2 class="title">新規会員登録</h2>
            <form action="../logic/register.php" method="POST">
                <input class="input-form" placeholder="名前" type="text" name="name" required maxlength="20">
                <input class="input-form" placeholder="メールアドレス" type="email" name="email" required>
                <input class="input-form" placeholder="パスワード" type="password" name="password" required maxlength="8">
                <input class="submit-btn" type="submit" value="新規登録">
            </form>
            <p>すでに登録済みの方は<a href="login.php">こちら</a></p>
        </div>
    </div>
</body>

</html>