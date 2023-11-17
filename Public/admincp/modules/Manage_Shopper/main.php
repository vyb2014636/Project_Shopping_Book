<?php
if (isset($_GET["page"]) && isset($_GET["query"])) {
  $page = $_GET["page"];
  $query = $_GET["query"];
} else {
  $page = "";
  $query = "";
}
if ($page == "shopper" && $query == "listed") {
  include_once __DIR__ . '/listed.php';
} else if ($query == "edit") {
  include_once __DIR__ . '/edit.php';
} elseif ($page == "shopper" && $query == "add") {
  include_once __DIR__ . '/add.php';
} elseif ($page == "shopper" && $query == "detail") {
  include_once __DIR__ . '/detail.php';
} else {
  include_once __DIR__ . '/../../index.php';
}
