<?php
session_start();
require_once __DIR__ . "/../Public/admincp/config/config.php";
if (isset($_GET["logout"])) {
  $logout = $_GET["logout"];
  if ($logout == "2") {
    unset($_SESSION["login"]);
    unset($_SESSION["role"]);
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
    } elseif ($page == 'login') {
      include_once __DIR__ . '/../Public/pages/main/login.php';
    } elseif ($page == 'register') {
      include_once __DIR__ . '/../Public/pages/main/register.php';
    } elseif (isset($_GET['stext'])) {
      if (isset($_GET['stext'])) {
        $stext = $_GET['stext'];
        $sql = "SELECT * FROM book WHERE TenSach LIKE '%$stext%'";
        try {
          $statement = $pdo->prepare($sql);
          $statement->execute();
          $htmlspecialchars = 'htmlspecialchars';
        } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
      }
      include_once __DIR__ . '/../Public/pages/main/search.php';
    } else {
      include_once __DIR__ . '/../Public/pages/main.php';
    }

    include_once __DIR__ . '/../Public/pages/footer.php';
  }
} else {

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
  } elseif ($page == 'login') {
    include_once __DIR__ . '/../Public/pages/main/login.php';
  } elseif ($page == 'register') {
    include_once __DIR__ . '/../Public/pages/main/register.php';
  } elseif (isset($_GET['stext'])) {
    if (isset($_GET['stext'])) {
      $stext = $_GET['stext'];
      $sql = "SELECT * FROM book WHERE TenSach LIKE '%$stext%' ";
      try {
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $htmlspecialchars = 'htmlspecialchars';
      } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    }
    include_once __DIR__ . '/../Public/pages/main/search.php';
  } else {
    include_once __DIR__ . '/../Public/pages/main.php';
  }

  //
  include_once __DIR__ . '/../Public/pages/footer.php';
}
