<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=shopping_book", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo 'kết nối thành công nhớ là nữa xong phải tắt';
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
