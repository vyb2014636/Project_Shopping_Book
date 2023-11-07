<?php
session_start();
require_once __DIR__ . "/../../admincp/config/config.php";


if (isset($_SESSION['login'])) {
  if ((isset($_POST["add-cart"]) && $_POST["add-cart"])) {
    $id_user = $_SESSION['login']['username'];
    $imgbook = $_POST["img-book"];
    $namebook = $_POST["name-book"];
    $pricebook = $_POST["price-book"];
    if (isset($_POST["quantity"])) {
      $quantitybook = $_POST["quantity"];
    } else {
      $quantitybook = 1;
    }
    $idbook = $_POST["MaSach"];
    $idcate = $_POST["MaTheLoai"];
    $statement = $pdo->prepare("SELECT * FROM cart WHERE TenTaiKhoan LIKE '%$id_user%' AND MaSach LIKE '%$idbook%'");
    $statement->execute();
    $row_count = $statement->rowCount();
    if ($row_count > 0) {
      $statement = $pdo->prepare("UPDATE cart  SET SoLuong = SoLuong+1 WHERE TenTaiKhoan LIKE '%$id_user%' AND MaSach LIKE '%$idbook%'");
      $statement->execute();
    } else {
      $statement = $pdo->prepare("INSERT INTO cart (TenTaiKhoan,MaSach,TenSach,HinhAnh,DonGia,SoLuong,MaTheLoai) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $statement->execute([
        $id_user,
        $idbook,
        $namebook,
        $imgbook,
        $pricebook,
        $quantitybook,
        $idcate
      ]);
    }
    header('location: ../../index.php');
  } elseif (isset($_GET["want"]) && $_GET["want"] == 'delcartid') {
    $id_user = $_SESSION['login']['username'];
    $id  = $_GET['id'];
    $sql = "DELETE FROM cart WHERE MaSach LIKE '%$id%' AND TenTaiKhoan LIKE '%$id_user%'  LIMIT 1";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    if (isset($_GET["stay"]) && $_GET['stay'] == 1) {
      header('location: ../../index.php?page=cart');
    } else {
      header('location: ../../index.php');
    }
  } elseif (isset($_GET['act']) && isset($_GET['idbook'])) {
    $id_user = $_SESSION['login']['username'];
    $act = $_GET['act'];
    $idbook = $_GET['idbook'];
    if ($act == 'plus') {
      $statement = $pdo->prepare("UPDATE cart  SET SoLuong = SoLuong+1 WHERE TenTaiKhoan LIKE '%$id_user%' AND MaSach LIKE '%$idbook%'");
      $statement->execute();
    } else {
      $statement = $pdo->prepare("UPDATE cart  SET SoLuong = SoLuong-1 WHERE TenTaiKhoan LIKE '%$id_user%' AND MaSach LIKE '%$idbook%'");
      $statement->execute();
    }
    header('location: ../../index.php?page=cart');
  } else {
    $id_user = $_SESSION['login']['username'];
    $sql = "DELETE FROM cart WHERE TenTaiKhoan LIKE '%$id_user%'";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    header('location: ../../index.php');
  }
} else {
  if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
  }
  if (isset($_GET["want"]) && $_GET["want"] == 'delcart') {
    if (isset($_SESSION["cart"])) {
      unset($_SESSION['cart']);
      header('location: ../../index.php');
    }
  }
  if (isset($_GET["want"]) && $_GET["want"] == 'delcartid') {
    $iddel = $_GET['id'];
    $stay  = $_GET['stay'];
    $a = 0;
    foreach ($_SESSION['cart'] as $itemcart) {
      if ($itemcart[0] == $iddel) {
        array_splice($_SESSION['cart'][$a], 0);
        array_splice($_SESSION['cart'], $a, 1);
        break;
      }
      $a++;
    }
    if ($stay == 1) {
      header('location: ../../index.php?page=cart');
    } else {
      header('location: ../../index.php');
    }
  }
  if ((isset($_POST["add-cart"]) && $_POST["add-cart"]  && !isset($_SESSION['login']))) {
    $imgbook = $_POST["img-book"];
    $namebook = $_POST["name-book"];
    $pricebook = $_POST["price-book"];
    if (isset($_POST["quantity"])) {
      $quantitybook = $_POST["quantity"];
    } else {
      $quantitybook = 1;
    }
    $idbook = $_POST["MaSach"];
    $idcate = $_POST["MaTheLoai"];
    $idx = 0;
    $i = 0;
    foreach ($_SESSION["cart"] as $cart_item) {
      if ($cart_item[0] == $idbook) {
        $idx = 1;
        $quantitynew = $_SESSION["cart"][$i][4] + $quantitybook;
        $_SESSION["cart"][$i][4] = $quantitynew;
        break;
      }
      $i++;
    }
    if ($idx == 0) {
      $item = array($idbook, $namebook, $imgbook,  $pricebook, $quantitybook, $idcate);
      $_SESSION["cart"][] = $item;
    }
    header('location: ../../index.php');
  } elseif (isset($_POST["add-cart-quantity"]) && $_POST["add-cart-quantity"]) {
    $imgbook = $_POST["img-book"];
    $namebook = $_POST["name-book"];
    $pricebook = $_POST["price-book"];
    if (isset($_POST["quantity"])) {
      $quantitybook = $_POST["quantity"];
    } else {
      $quantitybook = 1;
    }
    $idbook = $_POST["MaSach"];
    $idcate = $_POST["MaTheLoai"];

    $idx = 0;
    $i = 0;
    foreach ($_SESSION["cart"] as $cart_item) {
      if ($cart_item[0] == $idbook) {
        $idx = 1;
        $quantitynew = $_SESSION["cart"][$i][4] + $quantitybook;
        $_SESSION["cart"][$i][4] = $quantitynew;
        break;
      }
      $i++;
    }
    if ($idx == 0) {
      $item = array($idbook, $namebook, $imgbook,  $pricebook, $quantitybook, $idcate);
      $_SESSION["cart"][] = $item;
    }
    header('location: ../../index.php');
  }
}
