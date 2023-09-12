<?php
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=comments;charset=utf8',
        'root',
        ''
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // データベースから最新の10件のコメントを取得
    $sql = "SELECT name, message FROM comments ORDER BY id DESC LIMIT 10";
    $stmh = $pdo->query($sql);
    $selectedMessageContents = $stmh->fetchAll(PDO::FETCH_ASSOC);

    // データベース接続を閉じる
    $pdo = null;

    if (!empty($selectedMessageContents)) {
        $commentIndex = 1;
        $commentCount = count($selectedMessageContents);
        $startIndex = 10 - $commentCount;

        foreach ($selectedMessageContents as $selectedMessage) {
            $name = htmlspecialchars($selectedMessage['name']);
            $message = htmlspecialchars($selectedMessage['message']);
            $commentClass = 'd' . ($startIndex + $commentIndex);

            echo '<dt class="t' . $commentIndex . '"></dt>';
            echo '<dd class="' . $commentClass . '">' . $name . ': ' . $message . '</dd>';

            $commentIndex++;
        }
    } else {
        echo "<h2>投稿されたコメントはありません。</h2>";
    }
} catch (PDOException $Exception) {
    die('接続エラー：' . $Exception->getMessage());
}
?>
