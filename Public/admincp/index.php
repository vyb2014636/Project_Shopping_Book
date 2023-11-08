<?php
session_start();
if (isset($_GET["logout"])) {
  if ($_GET["logout"] == "1") {
    unset($_SESSION["loginAD"]);
    unset($_SESSION["role"]);
    session_destroy();
    header("location: login.php");
  }
}
if (isset($_SESSION["loginAD"]) && $_SESSION["role"] == 1) {
  require_once __DIR__ . "/../admincp/config/config.php";
  include_once __DIR__ . '/../admincp/modules/header.php';
?>
  <main>
    <?php
    if (isset($_GET['page']) && $_GET['page']) {
      $pages = $_GET['page'];
      if ($pages == 'category') {
        include_once __DIR__ . '/modules/Manage_Category/main.php';
      } elseif ($pages == 'books') {
        include_once __DIR__ . '/modules/Manage_Book/main.php';
      }
    } else {
      echo '<h1 class="text-center">Đây là trang giới thiệu</h1>';
    }
    ?>

  </main>


<?php
  include_once __DIR__ . '/../admincp/modules/footer.php';
} else {
  header('location: login.php');
} ?>