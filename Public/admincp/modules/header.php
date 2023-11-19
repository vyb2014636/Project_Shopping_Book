<!DOCTYPE html>
<html class="no-js" lang="">


<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>CT275 - Project_ShoppingBook</title>
  <meta name="description" content="Maneger-Stock" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png" />
  <!-- <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png" /> -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" /> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css" />
  <link rel="stylesheet" href="asset/css/cs-skin-elastic.css" />
  <link rel="stylesheet" href="asset/css/style.css" />
  <link rel="stylesheet" href="../../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="asset/js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <style>
    #weatherWidget .currentDesc {
      color: #ffffff !important;
    }

    .traffic-chart {
      min-height: 335px;
    }

    #flotPie1 {
      height: 150px;
    }

    #flotPie1 td {
      padding: 3px;
    }

    #flotPie1 table {
      top: 20px !important;
      right: -10px !important;
    }

    .chart-container {
      display: table;
      min-width: 270px;
      text-align: left;
      padding-top: 10px;
      padding-bottom: 10px;
    }

    #flotLine5 {
      height: 105px;
    }

    #flotBarChart {
      height: 150px;
    }

    #cellPaiChart {
      height: 160px;
    }
  </style>
</head>

<body>
  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel d-sm-none d-md-block" style="width: 19%;">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="">
            <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard
            </a>
          </li>
          <li class="menu-title">Chức năng</li>
          <!-- /.menu-title -->
          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa-brands fa-product-hunt"></i>Thể loại</a>
            <ul class="sub-menu children dropdown-menu">
              <li>
                <i class="fa fa-list"></i><a href="index.php?page=category&query=listed">Danh sách</a>
              </li>
              <li>
                <i class="fa fa-plus"></i><a href="index.php?page=category&query=add">Thêm</a>
              </li>
            </ul>
          </li>
          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa-brands fa-product-hunt"></i>Sản phẩm</a>
            <ul class="sub-menu children dropdown-menu">
              <li>
                <i class="fa fa-list"></i><a href="index.php?page=books&query=listed">Danh sách</a>
              </li>
              <li>
                <i class="fa fa-plus"></i><a href="index.php?page=books&query=add">Thêm</a>
              </li>
            </ul>
          </li>
          <li class=" menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa-solid fa-user"></i>
              Khách hàng
            </a>
            <ul class="sub-menu children dropdown-menu">
              <li>
                <i class="fa fa-list"></i>
                <a href="index.php?page=shopper&query=listed">Danh sách</a>
              </li>
            </ul>
          </li>
          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa fa-table"></i>Đơn hàng</a>
            <ul class="sub-menu children dropdown-menu">
              <li>
                <i class="fa fa-list"></i><a href="index.php?page=order&query=listed">Danh sách đơn hàng</a>
              </li>
            </ul>
          </li>

          <?php
          if (!isset($_SESSION['loginAD'])) {
          ?>
            <li class="
                    <?php if ($page == 'setting') {
                      echo 'active';
                    }  ?> menu-item-has-children dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="menu-icon fa fa-chain"></i>Cài đặt</a>
              <ul class="sub-menu children dropdown-menu">
                <li>
                  <i class="menu-icon fa fa-sign-in"></i><a href="index.php?page=setting&act=login">Đăng nhập</a>
                </li>
                <li>
                  <i class="menu-icon fa fa-sign-in"></i><a href="index.php?page=setting&act=signup">Đăng ký</a>
                </li>
              </ul>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>
  </aside>
  <!-- /#left-panel -->

  <!-- Right Panel -->
  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header d-flex justify-content-between align-items-center ">
      <div class="top-left " id="top-left" style="width: 19%;">
        <div class="navbar-header d-flex justify-content-between align-items-center" style="width: 100%;">
          <a class="navbar-brand " href="./" style="display: inline; color: #38284f; font-weight: bold;">
            <strong><i class="fa-solid fa-book fa-2xl"></i>ookLV </strong>
          </a>
          <a id="menuToggle" class="menutoggle p-0 d-sm-none d-md-block"><i class="fa fa-bars"></i></a>
        </div>
      </div>
      <div class="top-right d-sm">
        <div class="header-menu">
          <div class="user-area dropdown float-right">
            <?php if (isset($_SESSION['loginAD'])) { ?>
              <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <p class="mx-3 align-middle mb-0 font-weight-bold">
                  Hello, <?php echo $_SESSION['loginAD']['username'] ?>
                </p>
                <img class="user-avatar rounded-circle" src="https://png.pngtree.com/png-vector/20190118/ourmid/pngtree-user-vector-icon-png-image_328702.jpg" alt="User Avatar" />
              </a>

            <?php
            }
            ?>

            <div class="user-menu dropdown-menu">
              <a class="nav-link" href="#"><i class="fa fa- user"></i>Tài khoản của tôi</a>

              <a class="nav-link" href="#"><i class="fa fa -cog"></i>Cài đặt</a>

              <a class="nav-link" href="index.php?logout=1"><i class=" fa fa-power -off"></i>Đăng xuất</a>
            </div>
          </div>
        </div>
      </div>

    </header>