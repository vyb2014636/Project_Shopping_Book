<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trang chủ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha	512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../js/script.js"></script>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    .chevronsas span {
      width: 4%;
      height: 20px;
      background-color: #2727271a;
      display: inline;
    }

    .chevronsas :hover .chevronsas span {
      background-color: black;
      color: white;
    }
  </style>
</head>

<body style="background-color: #efefef;">
  <header>
    <div class="superNav border-bottom p-3" style="background-color: #38284f; color: white">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <span class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><i class="fa-solid fa-users fa-xl"></i>
              <a href="../admincp/index.php"><strong>Quản lý</strong></a></span>
            <span class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><i class="fa-solid fa-envelope fa-xl"></i>
              <a href="../admincp/index.php"><strong>Mail</strong></a></span>
            <span class="me-3"><i class="fa-solid fa-phone fa-xl"></i>
              <strong>0919781348</strong></span>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none text-end">
            <span class="me-3"><a class="text-decoration-none" href="#">Hỗ Trợ</a></span>
            <span class="me-3"><a class="text-decoration-none" href="#">Chính Sách</a></span>
            <span class="me-3"><a class="text-decoration-none" href="#">Dịch Vụ</a></span>
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 px-2 shadow-sm">
      <div class="container px-0">
        <div class="row" style="width: 100%; padding: 0 12px">
          <!-- Nav-PC-->

          <!---->
          <div id="logo-shop" class="d-flex align-items-center col-md-2 justify-content-md-start justify-content-center">
            <a class="navbar-brand m-0 text-center" href="index.php"><strong><i class="fa-solid fa-book fa-2xl"></i>ookLV </strong></a>
          </div>
          <!--/-->

          <!---->
          <div class="navbar-nav col-md-8 d-md-flex d-none align-items-center justify-content-center p-0" id="nav-category-1">
            <div class="nav-item link-nav">
              <a class="nav-link link-nav-item text-uppercase" aria-current="page" href="../index.php?page=home"><span>Trang chủ <after></after></span></a>
            </div>
            <div class="nav-item link-nav">
              <a class="nav-link link-nav-item text-uppercase" aria-current="page" href="../index.php?page=category" data-bs-toggle="offcanvas" data-bs-target="#category" aria-controls="category"><span>Thể loại<after></after>&nbsp;</span><i class="fa-solid fa-chevron-down "> </i></a>
            </div>

            <div class="nav-item link-nav">
              <a class="nav-link link-nav-item text-uppercase" href="../index.php?page=order"><span> <span class="position-absolute rounded-circle text-center" style="
                      width: 8px;
                      height: 8px;
                      top: -1px;
                      right: -6px;
                      background-color: #38284f;
                      font-size: 12px;
                      color: white;
                    " id="quantity-in-cart"><strong></strong></span>Đơn hàng<after></after></span></a>
            </div>

          </div>
          <!--/-->

          <!---->
          <div class="navbar-nav col-md-2 d-md-flex d-none align-items-center justify-content-end p-0">
            <div class="nav-item">
              <button class="nav-link mx-2 text-uppercase btn" type="button" data-bs-toggle="collapse" data-bs-target="#search-pc" aria-expanded="false" aria-controls="search-pc">
                <i class="fa-sharp fa-solid fa-magnifying-glass fa-xl"></i>
              </button>
            </div>
            <div class="nav-item">
              <a class="nav-link mx-2 text-uppercase position-relative" data-bs-toggle="offcanvas" data-bs-target="#menu-cart-shopping" aria-controls="menu-cart-shopping"><i class="fa-sharp fa-solid fa-cart-shopping fa-xl tex"></i>
                <span class="position-absolute rounded-circle text-center" style="
                      width: 17px;
                      height: 17px;
                      top:-2px;
                      right: 0px;
                      background-color: #38284f;
                      font-size: 12px;
                      color: white;
                    " id="quantity-in-cart"><strong>
                    <?php

                    if (isset($_SESSION['login'])) {
                      $tk = $_SESSION['login']['username'];
                      $statement = $pdo->prepare("SELECT * FROM cart WHERE TenTaiKhoan LIKE '%$tk%' AND MaDonHang=0");
                      $statement->execute();
                      $row_count = $statement->rowCount();
                      echo $row_count;
                    } else {
                      if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
                        echo count($_SESSION["cart"]);
                      } else {
                        echo '0';
                      }
                    }
                    ?>
                  </strong>
                </span></a>
            </div>
            <?php
            if (!isset($_SESSION['login'])) {
            ?>
              <div class="nav-item">
                <a class="nav-link ms-2 text-uppercase" href="index.php?page=login"><i class="fa-solid fa-user fa-xl"></i></a>
              </div>
            <?php
            } ?>
            <?php
            if (isset($_SESSION['login'])) {
            ?>
              <div class="nav-item">
                <a class="nav-link ms-2 text-uppercase" href="index.php?page=profile"><img src="../img/avatar_user/<?php echo $_SESSION['login']['img'] ?>" style="width: 100%;"></a>
              </div>
              <div class="nav-item">
                <a class="nav-link ms-2 text-uppercase" id="signout" href="#"><i class="fa-solid fa-right-from-bracket fa-xl"></i> </a>
              </div>
              <script>
                $(document).ready(function() {
                  $("#signout").click(function(e) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Thành công',
                      text: 'Đã đăng xuất',
                    }).then(function() {
                      window.location.href = '../index.php?logout=2'
                    });
                  });
                });
              </script>
            <?php
            }
            ?>
          </div>
          <!--/-->

          <!--/Nav PC-->


          <!-- Nav Mobile-->
          <div class="d-md-none d-flex justify-content-between px-4 align-items-center mt-3">
            <!-- Menu mobile -->
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <button class="navbar-toggler p-2 border-0" type="button" data-bs-toggle="collapse" href="#menu-mobile" role="button" aria-expanded="false" aria-controls="#menu-mobile">
                  <i class="fa-sharp fa-solid fa-bars fa-xl"></i>
                </button>
              </div>
            </div>
            <!-- Menu mobile -->
            <?php
            if (isset($_SESSION['login'])) {
            ?>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <button class="navbar-toggler p-2 border-0" type="button" data-bs-toggle="collapse" href="#menu-user" role="button" aria-expanded="false" aria-controls="#menu-user">
                    <i class="fa-sharp fa-solid fa-user fa-xl"></i>
                  </button>
                </div>
              </div>

            <?php } ?>
            <!-- cart Mobile-->
            <div>
              <a class="nav-link text-uppercase position-relative" href="../index.php?page=cart"><i class="fa-sharp fa-solid fa-cart-shopping fa-xl tex"></i>
                <span class="position-absolute rounded-circle text-center" style="
                      width: 20px;
                      height: 22px;
                      top: -14px;
                      right: -10px;
                      background-color: #38284f;
                      color: white;
                    " id="quantity-in-cart">
                  <strong>
                    <?php

                    if (isset($_SESSION['login'])) {
                      $tk = $_SESSION['login']['username'];
                      $statement = $pdo->prepare("SELECT * FROM cart WHERE TenTaiKhoan LIKE '%$tk%' AND MaDonHang=0");
                      $statement->execute();
                      $row_count = $statement->rowCount();
                      echo $row_count;
                    } else {
                      if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
                        echo sizeof($_SESSION["cart"]);
                      } else {
                        echo '0';
                      }
                    }
                    ?>
                  </strong>
                </span></a>
            </div>
            <!-- cart Mobile-->
          </div>
          <!-- Nav Mobile-->
        </div>
      </div>
    </nav>
  </header>
  <!---->

  <!--Show Nav PC-->
  <div style="
        width: 30%;
        margin-left: auto;
        padding-right: 136px;
        margin-top: 20px;
        background-color: #efefef;
      " class="d-none d-md-block">
    <form action="index.php?stext">
      <div class="collapse" id="search-pc">
        <div class="input-group">
          <input type="text" class="form-control border-dark" style="color: #7a7a7a" placeholder="Tìm kiếm sản phẩm" name="stext" />
          <button class="btn btn-dark text-white" type="submit">
            <i class="fa-solid fa-magnifying-glass fa-xl"></i>
          </button>
        </div>
      </div>
    </form>
  </div>

  <!--Show cart sidebar-->

  <!--Show Cart-->

  <!--Show Nav PC-->
  <!-- <div class="nav-item">
                <a class="nav-link ms-2 text-uppercase" href="index.php?page=profile"><i class="fa-solid fa-user fa-xl"></i></a>
              </div> -->
  <!--Show Nav Mobile-->
  <div class="collapse multi-collapse under-header d-md-none" id="menu-user">
    <ul style="list-style: none">
      <li class="pb-1 pt-2">
        <a class="dropdown-item" href="index.php?page=profile">Hồ sơ</a>
      </li>
      <li class="py-1"><a class="dropdown-item" href="../index.php?logout=2">Đăng xuất</a></li>
    </ul>
  </div>
  <div class="collapse multi-collapse under-header d-md-none" id="menu-mobile">
    <ul style="list-style: none">
      <li class="pb-1 pt-2">
        <a class="dropdown-item" data-bs-toggle="collapse" href="#categoryMB" role="button" aria-expanded="false" aria-controls="collapseExample">Danh mục</a>
        <ul style="list-style: none" class="collapse" id="categoryMB">
          <?php
          $sql = "SELECT * FROM category";
          try {
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $htmlspecialchars = 'htmlspecialchars';
          } catch (PDOException $e) {
            echo $e->getMessage();
          }
          while ($row = $statement->fetch()) {
          ?>
            <li class="pb-1 pt-2 link-nav">
              <a class="link-nav-item text-black" href="../index.php?page=category&idcate=<?php echo $htmlspecialchars($row['MaTheLoai']) ?>">
                <?php echo $htmlspecialchars($row['TenTheLoai']) ?>
                <after></after>
              </a>
            </li>
          <?php } ?>
        </ul>
      </li>
      <li class="py-1"><a class="dropdown-item" href="index.php?page=category&idcate=EDU">Sales</a></li>
      <li class="py-1"><a class="dropdown-item" href="index.php?page=login">Đăng nhập</a></li>
    </ul>
    <div class="py-1" style="padding-left: 32px">
      <form action="index.php?stext">
        <div class="d-flex justify-content-start">
          <div class="input-group" style="width: 80%">
            <input type="text" class="form-control border-dark" style="color: #7a7a7a" placeholder="Tìm kiếm sản phẩm" name="stext" />
            <button class="btn btn-dark text-white">
              <i class="fa-solid fa-magnifying-glass fa-xl"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--Show Nav Mobile-->

  <div class="offcanvas offcanvas-start rounded m-3" data-bs-scroll="false" data-bs-backdrop="true" tabindex="-1" id="category" aria-labelledby="category-label" style=" width: 30%">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title ronaldo" id="category-label">Chọn thể loại sách</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="menu-cart-shopping-items">
      <div class="category">

        <?php
        $sql = "SELECT * FROM category";
        try {
          $statement = $pdo->prepare($sql);
          $statement->execute();
          $htmlspecialchars = 'htmlspecialchars';
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
        while ($row = $statement->fetch()) {
        ?>
          <a class="text-black chevronsas p-2 d-flex justify-content-between chevronsas" href="../index.php?page=category&idcate=<?php echo $htmlspecialchars($row['MaTheLoai']) ?>"><?php echo $htmlspecialchars($row['TenTheLoai']) ?>
            <span class="rounded-circle my-auto d-flex align-items-center justify-content-center">
              <svg role="presentation" focusable="false" width="5" height="8" class="icon icon-chevron-right-small reverse-icon" viewBox="0 0 5 8">
                <path d="m.75 7 3-3-3-3" fill="none" stroke="currentColor" stroke-width="1.5"></path>
              </svg>
            </span>
          </a>
        <?php
        }
        ?>

      </div>
    </div>
  </div>