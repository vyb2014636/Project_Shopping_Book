<?php
if (isset($_GET['error'])) {
  $error = $_GET['error'];
  if ($error = 'empty') {
    header('location: ../../index.php?page=category&query=add');
  }
}
