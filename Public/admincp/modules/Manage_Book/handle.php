<?php
require_once __DIR__ . "/../../config/config.php";
// có click vào add-books hay không $_POST['add-books']
if (isset($_POST['add-book']) && $_POST['add-book']) {
  $IdBook = $_POST['id-book'];
  $NameBook = $_POST['name-book'];
  $IdAuthor = $_POST['id-author'];
  $PriceBook = $_POST['price-book'];
  $IdDM = $_POST['id-cate'];
  $ndbook = $_POST['content-book'];
  $nxb = $_POST['NXB-book'];
  $check = getimagesize($_FILES['img-book']['tmp_name']);
  if ($check === false) {
    echo "</br>Đây không phải file ảnh";
  } else {
    $tmpImg = $_FILES["img-book"]["tmp_name"];
    // 'uploads/' . $_FILES["img-book"]["name"]
    $uploads_dir = 'uploads/';
    $img = $_FILES["img-book"]["name"];

    $uploads_file = $uploads_dir . basename($_FILES["img-book"]["name"]);
    move_uploaded_file($tmpImg, $uploads_file);
    // if (!empty($IdBook) && !empty($NameBook)  && !empty($IdAuthor)  && !empty($PriceBook)  && !empty($IdDM) && $check === true)
    $sql = "INSERT INTO book (MaSach,TenSach,TacGia,NhaXB,NoiDung,DonGia,MaTheLoai,HinhAnh) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    try {
      $statement = $pdo->prepare($sql);
      $statement->execute([$IdBook, $NameBook, $IdAuthor, $nxb, $ndbook, $PriceBook, $IdDM, $img]);
      header('location: ../../index.php?page=books&&query=add');
    } catch (PDOException $e) {
      $pdo_error = $e->getMessage();
    }
  }

  if ($statement && $statement->rowCount() == 1) {
    echo '<p>Trích dẫn của bạn đã được lưu trữ!</p>';
  }
  header('location: ../../index.php?page=books&query=add');
}
//  elseif (empty($IdDM) || empty($NameDM)) {
//   header('location: error.php?error=empty');
// }
// }
// } 
elseif (isset($_GET['query']) &&  $_GET['query'] == 'delete') {
  $id  = $_GET['id'];
  $sqls = "SELECT * FROM book WHERE MaSach LIKE '%$id%' LIMIT 1";
  $statements = $pdo->prepare($sqls);
  $statements->execute();
  $rows = $statements->fetch();
  ///Đang làm xóa file
  unlink('uploads/' . $rows["HinhAnh"]);
  $sql = "DELETE FROM book WHERE MaSach LIKE '%$id%' LIMIT 1";
  $statement = $pdo->prepare($sql);
  $statement->execute();
  header('location: ../../index.php?page=books&&query=listed');
} elseif (isset($_POST['edit-book'])) {
  if ($_FILES['img-book'] != '') {
    $sql = "SELECT * FROM book WHERE MaSach LIKE '%$id_edit%' LIMIT 1";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $rows = $statement->fetch();

    unlink("uploads/" . $rows["HinhAnh"]);

    $id_edit = $_GET['id'];
    $sqlu = "UPDATE book SET MaSach = ?,TenSach = ?,TacGia = ?,NhaXB = ?,NoiDung = ?,DonGia = ?,MaTheLoai = ?, HinhAnh = ? WHERE MaSach LIKE '%$id_edit%'";
    $tmpImg = $_FILES["img-book"]["tmp_name"];
    $uploads_dir = 'uploads/';
    $img = $_FILES["img-book"]["name"];
    $uploads_file = $uploads_dir . basename($_FILES["img-book"]["name"]);
    move_uploaded_file($tmpImg, $uploads_file);
    try {
      $statementu = $pdo->prepare($sqlu);
      $statementu->execute([
        $_POST["id-book"],
        $_POST["name-book"],
        $_POST["id-author"],
        $_POST["NXB-book"],
        $_POST["content-book"],
        $_POST["price-book"],
        $_POST["id-cate"],
        $img
      ]);

      header('location: ../../index.php?page=books&&query=listed');
    } catch (PDOException $e) {
      $pdo_error = $e->getMessage();
    }
  }
} else {
  header('location: ../error.php?error=empty');
}
