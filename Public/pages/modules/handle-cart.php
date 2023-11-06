<?php
session_start();
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
if ((isset($_POST["add-cart"]) && $_POST["add-cart"])) {
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
