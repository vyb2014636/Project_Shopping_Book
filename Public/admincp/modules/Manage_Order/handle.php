<?php
require_once __DIR__ . "/../../config/config.php";
if (isset($_GET['query']) &&  $_GET['query'] == 'detail') {
  try {
    $id  = $_GET['id'];
    $sql = "DELETE FROM category WHERE MaTheLoai LIKE '%$id%' LIMIT 1";

    $statement = $pdo->prepare($sql);
    $statement->execute();
    header('location: ../../index.php?page=category&&query=listed');
  } catch (PDOException $e) {
  }
}
