<?php
session_start();
// print_r($_SESSION['cart']);
require_once __DIR__ . "/../Public/admincp/config/config.php";
include_once __DIR__ . '/../Public/pages/header.php';
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = "";
}
if ($page == 'category' &&  isset($_GET['idcate'])) {
  include_once __DIR__ . '/../Public/pages/main/category.php';
} elseif ($page == 'book') {
  include_once __DIR__ . '/../Public/pages/';
} elseif ($page == 'detail') {
  include_once __DIR__ . '/../Public/pages/main/detail.php';
} elseif ($page == 'cart') {
  include_once __DIR__ . '/../Public/pages/main/cart.php';
} else {
  include_once __DIR__ . '/../Public/pages/main.php';
}

//
include_once __DIR__ . '/../Public/pages/footer.php';
