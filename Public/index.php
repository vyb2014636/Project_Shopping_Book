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
  include_once __DIR__ . '/../Public/pages/main/category.php';
} elseif ($page == 'book') {
  include_once __DIR__ . '/../Public/pages/';
} elseif ($page == 'detail') {
  include_once __DIR__ . '/../Public/pages/main/detail.php';
} else {
  include_once __DIR__ . '/../Public/pages/main.php';
}

//
include_once __DIR__ . '/../Public/pages/footer.php';
