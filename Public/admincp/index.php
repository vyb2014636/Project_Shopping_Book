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
      } elseif ($pages == 'order') {
        include_once __DIR__ . '/modules/Manage_Order/main.php';
      }
    } else {
      include_once __DIR__ . '/modules/intro.php';
    }
    ?>

  </main>


<?php
  include_once __DIR__ . '/../admincp/modules/footer.php';
} else {
  header('location: login.php');
} ?>