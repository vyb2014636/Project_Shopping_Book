<?php
if (isset($_GET["page"]) && isset($_GET["query"])) {
  $page = $_GET["page"];
  $query = $_GET["query"];
} else {
  $page = "";
  $query = "";
}
if ($page == "books" && $query == "add") {
  include_once __DIR__ . '/add.php';
  include_once __DIR__ . '/listed.php';
} else if ($query == "edit") {
  include_once __DIR__ . '/edit.php';
} else {
  include_once __DIR__ . '/../../index.php';
}
