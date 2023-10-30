<?php
// include_once __DIR__ . 'pages/modules/header.php';
require_once __DIR__ . "/../Public/admincp/config/config.php";
include_once __DIR__ . '/../Public/pages/header.php';
$page;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = '';
}
if ($page == 'category' &&  isset($_GET['idcate'])) {
  include_once __DIR__ . '/../Public/pages/main/xuly.php';
} elseif ($page == 'book') {
  include_once __DIR__ . '/../Public/pages/';
} else {
  include_once __DIR__ . '/../Public/pages/index.php';
}
include_once __DIR__ . '/../Public/pages/footer.php';
