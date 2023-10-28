<?php
if (isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = "";
}
if ($page == "category") {
  include_once __DIR__ . '/add.php';
  include_once __DIR__ . '/listed.php';
} else {
  include_once __DIR__ . '/modules/index.php';
}
