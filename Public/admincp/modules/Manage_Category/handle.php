<?php
require_once __DIR__ . "/../../config/config.php";

if (isset($_POST['add-cate']) && $_POST['add-cate']) {
  $IdDM = $_POST['id-cate'];
  $NameDM = $_POST['name-cate'];
  if (!empty($IdDM) && !empty($NameDM)) {

    $sql = "INSERT INTO category (MaTheLoai,TenTheLoai) VALUES (?, ?)";
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
    header('location: ../../index.php?page=category&query=add');
  } elseif (empty($IdDM) || empty($NameDM)) {
    header('location: error.php?error=empty');
  }
} elseif (isset($_GET['query']) &&  $_GET['query'] == 'delete') {
  $id  = $_GET['id'];
  $sql = "DELETE FROM category WHERE MaTheLoai LIKE '%$id%' LIMIT 1";

  $statement = $pdo->prepare($sql);
  $statement->execute();

  header('location: ../../index.php?page=category&&query=listed');
} elseif (isset($_POST['edit-cate'])) {
  $id_edit = $_GET['id'];
  $sql = "UPDATE category SET MaTheLoai = ?, TenTheLoai = ? WHERE MaTheLoai LIKE '%$id_edit%'";
  try {
    $statement = $pdo->prepare($sql);
    $statement->execute([
      $_POST["id-cate"],
      $_POST["name-cate"]
    ]);
    header('location: ../../index.php?page=category&&query=add');
  } catch (PDOException $e) {
    $pdo_error = $e->getMessage();
  }
} else {
  header('location: ../error.php?error=empty');
}
