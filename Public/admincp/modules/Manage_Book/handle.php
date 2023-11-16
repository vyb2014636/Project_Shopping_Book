<?php
require_once __DIR__ . "/../../config/config.php";
// có click vào add-books hay không $_POST['add-books']
if (isset($_POST['add-book']) && $_POST['add-book']) {
  if (empty($_POST['id-book']) || empty($_POST['name-book']) || empty($_POST['id-author']) || empty($_POST['price-book']) || empty($_POST['id-cate']) || empty($_POST['NXB-book']) || empty($_FILES['img-book']['name']) || empty($_FILES['img-book2']['name']) || empty($_FILES['img-book3']['name'])) {
  } else {
    $IdBook = $_POST['id-book'];
    $NameBook = $_POST['name-book'];
    $IdAuthor = $_POST['id-author'];
    $PriceBook = $_POST['price-book'];
    $IdDM = $_POST['id-cate'];
    $nxb = $_POST['NXB-book'];
    $check = getimagesize($_FILES['img-book']['tmp_name']);
    $check2 = getimagesize($_FILES['img-book2']['tmp_name']);
    $check3 = getimagesize($_FILES['img-book3']['tmp_name']);


    if ($check === false && $check3 === false && $check2 === false) {
      echo "</br>Đây không phải file ảnh";
    } else {
      $tmpImg = $_FILES["img-book"]["tmp_name"];
      $tmpImg2 = $_FILES["img-book2"]["tmp_name"];
      $tmpImg3 = $_FILES["img-book3"]["tmp_name"];

      // 'uploads/' . $_FILES["img-book"]["name"]
      $uploads_dir = 'uploads/';
      $img = $_FILES["img-book"]["name"];
      $img2 = $_FILES["img-book2"]["name"];
      $img3 = $_FILES["img-book3"]["name"];
      $img = time() . '_' . $img;
      $img2 = time() . '_' . $img2;
      $img3 = time() . '_' . $img3;

      $uploads_file = $uploads_dir . basename($img);
      $uploads_file2 = $uploads_dir . basename($img2);
      $uploads_file3 = $uploads_dir . basename($img3);

      move_uploaded_file($tmpImg, $uploads_file);
      move_uploaded_file($tmpImg2, $uploads_file2);
      move_uploaded_file($tmpImg3, $uploads_file3);
      try {
        $sql = "INSERT INTO book (MaSach,TenSach,TacGia,NhaXB,DonGia,MaTheLoai,HinhAnh,HinhAnh2,HinhAnh3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->execute([$IdBook, $NameBook, $IdAuthor, $nxb,  $PriceBook, $IdDM, $img, $img2, $img3]);
      } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
      }
    }
  }
  // if ($statement && $statement->rowCount() == 1) {
  //   echo '<p>Trích dẫn của bạn đã được lưu trữ!</p>';
  // }

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
  unlink('uploads/' . $rows["HinhAnh2"]);
  unlink('uploads/' . $rows["HinhAnh3"]);
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
    unlink("uploads/" . $rows["HinhAnh2"]);
    unlink("uploads/" . $rows["HinhAnh3"]);

    $id_edit = $_GET['id'];
    $sqlu = "UPDATE book SET MaSach = ?,TenSach = ?,TacGia = ?,NhaXB = ?,DonGia = ?,MaTheLoai = ?, HinhAnh = ?, HinhAnh2 = ?, HinhAnh3 = ? WHERE MaSach LIKE '%$id_edit%'";
    $tmpImg = $_FILES["img-book"]["tmp_name"];
    $uploads_dir = 'uploads/';
    $img = $_FILES["img-book"]["name"];
    $img2 = $_FILES["img-book2"]["name"];
    $img3 = $_FILES["img-book3"]["name"];

    $img = time() . '_' . $img;
    $img2 = time() . '_' . $img2;
    $img3 = time() . '_' . $img3;

    $uploads_file = $uploads_dir . basename($img);
    $uploads_file2 = $uploads_dir . basename($img2);
    $uploads_file3 = $uploads_dir . basename($img3);

    move_uploaded_file($tmpImg, $uploads_file);
    move_uploaded_file($tmpImg, $uploads_file2);
    move_uploaded_file($tmpImg, $uploads_file3);
    try {
      $statementu = $pdo->prepare($sqlu);
      $statementu->execute([
        $_POST["id-book"],
        $_POST["name-book"],
        $_POST["id-author"],
        $_POST["NXB-book"],
        $_POST["price-book"],
        $_POST["id-cate"],
        $img,
        $img2,
        $img3
      ]);
      header('location: ../../index.php?page=books&&query=listed');
    } catch (PDOException $e) {
      $pdo_error = $e->getMessage();
    }
  }
} else {
  header('location: ../error.php?error=empty');
}
