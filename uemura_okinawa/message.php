<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1 style="font-weight: lighter;font-size: 24px">投稿確認欄</h1>
<?php
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=comments;charset=utf8',
        'root',
        ''
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $Exception) {
    die('接続エラー：' . $Exception->getMessage());
}

try {
    $sql = "SELECT * FROM comments ORDER BY id DESC"; 
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
} catch (PDOException $Exception) {
    die('接続エラー：' . $Exception->getMessage());
}

$pdo = null;
?>

<form action="index.php" method="post">
    <table border="1" style="border-collapse: collapse">
        <tbody>
            <tr>
                <th>チェック</th>
                <th>ID</th>
                <th>名前</th>
                <th>メール</th>
                <th>メッセージ</th>
            </tr>
            <?php
            while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <th><input type="checkbox" name="selected_messages[]" value="<?= htmlspecialchars($row['message']) ?>"></th>
                    <th><?= htmlspecialchars($row['id']) ?></th>
                    <th><?= htmlspecialchars($row['name']) ?></th>
                    <th><?= htmlspecialchars($row['email']) ?></th>
                    <th><?= htmlspecialchars($row['message']) ?></th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <input type="submit" name="submit" value="決定" style="padding:8px;margin:16px;"><b>メッセージの項目を「投稿されたメッセージ」に追加する</b>
</form>





<!-- CSS -->
<style>
	body{
		padding: 40px;
	}
</style>

</body>
</html>
