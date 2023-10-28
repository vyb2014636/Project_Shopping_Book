<?php
require_once __DIR__ . "/../../config/config.php";

if (isset($_POST['add-cate']) && $_POST['add-cate']) {
  $IdDM = $_POST['id-cate'];
  $NameDM = $_POST['name-cate'];
  if (!empty($IdDM) && !empty($NameDM)) {

    $sql = "INSERT INTO category (IdDanhMuc,TenTheLoai) VALUES (?, ?)";
    try {
      $statement = $pdo->prepare($sql);
      $statement->execute([
        $IdDM,
        $NameDM
      ]);
    } catch (PDOException $e) {
      $pdo_error = $e->getMessage();
    }
    if ($statement && $statement->rowCount() == 1) {
      echo '<p>Trích dẫn của bạn đã được lưu trữ!</p>';
    }
    header('location: ../../index.php?page=category');
  } elseif (!empty($NameDM) && empty($IdDM)) {
    header('location: ../../index.php?page=category&&idalert=saiid');
  } else {
    header('location: ../../index.php?page=category&&namealert=sainame');
  }
} elseif (isset($_GET['query']) &&  $_GET['query'] == 'delete') {
  $id  = $_GET['id'];
  $sql = "DELETE FROM category WHERE IdDanhMuc LIKE '%$id%' LIMIT 1";

  $statement = $pdo->prepare($sql);
  $statement->execute();

  header('location: ../../index.php?page=category');
}
