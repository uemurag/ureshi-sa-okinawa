<?php
try {
  $dsn = 'mysql:dbname=comments;host=localhost';
  $user = 'root';
  $password = '';
 
  $PDO = new PDO($dsn, $user, $password); 
  $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $timestamp = date("Y-m-d H:i:s"); 

  $sql = "INSERT INTO comments (name, email, message, timestamp) VALUES (:name, :email, :message, :timestamp)"; 
  $stmt = $PDO->prepare($sql); 
  $params = array(':name' => $name, ':email' => $email, ':message' => $message, ':timestamp' => $timestamp); 
  $stmt->execute($params); 
 } catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thank You</title>
</head>
<body>
<div>
  <img border="0" src="images/thank-you.jpg" width="" height="600px" alt="thank you">
</div>

<style>
  div {
    text-align: center;
    margin: 40px 0;
  }
</style>
	
</body>
</html>
