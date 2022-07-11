<?php

require_once dirname(__DIR__) . '/logic/read_post.php';
require_once dirname(__DIR__) . '/logic/read_user.php';
require_once dirname(__DIR__) . '/logic/helper.php';

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>

    <link rel="stylesheet" href="../assets/global.css">
    <link rel="stylesheet" href="../assets/home.css">
</head>

<body>
    <div class="container">
        <div class="home-main">
            <h1 class="title"><?php echo spChars($msg); ?></h1>
            <form action="../logic/post.php" method="POST">
                <textarea class="body-form" placeholder="ここに投稿内容を書き込んでね" name="post" id="" cols="30" rows="10"></textarea>
                <input class="write-btn" type="submit" value="書き込む">
            </form>
            <ul class="lists">
                <?php foreach ($posts as $post) {?>
                    <li class="item">
                        <div class="meta">
                            <div class="meta-left">
                                <p class="name">
                                    <?php echo spChars($post['name']); ?>
                                </p>
                                <?php if($post['user_id'] === $_SESSION['id']) : ?>
                                    <form action="../logic/delete_post.php" method="POST">
                                        <input class="delete-btn" type="submit" value="削除する">
                                        <!-- ユーザーのブラウザには表示されないボタン -->
                                        <input type="hidden" style="display: none" name="postId" value="<?php echo $post['id'] ?>" >
                                    </form>
                                <?php endif ?>
                            </div>
                            <p class="date">
                                <?php echo spChars($post['updated_at']); ?>
                            </p>
                        </div>
                        <h2 class="post">
                            <?php echo spChars($post['post']); ?>
                        </h2>
                    </li>
                <?php } ?>
            </ul>
            <a href="./logout.php">ログアウト</a>
        </div>
    </div>
</body>

</html>