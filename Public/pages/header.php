<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trang chủ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/style.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
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
            <a class="navbar-brand m-0 text-center" href="index.php"><strong>NAME SHOP </strong></a>
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
              <a class="nav-link link-nav-item text-uppercase" href="../index.php?page=book"><span>Sản phẩm<after></after></span></a>
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
                      top:-14px;
                      right: 0px;
                      background-color: #38284f;
                      font-size: 12px;
                      color: white;
                    " id="quantity-in-cart"><strong>
                    <?php
                    if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
                      echo count($_SESSION["cart"]);
                    } else {
                      echo '0';
                    }
                    ?>
                  </strong>
                </span></a>
            </div>
            <div class="nav-item">
              <a class="nav-link ms-2 text-uppercase" href="#"><i class="fa-solid fa-user fa-xl"></i></a>
            </div>
          </div>
          <!--/-->

          <!--/Nav PC-->


          <!-- Nav Mobile-->
          <div class="d-md-none d-flex justify-content-between px-4 align-items-center">
            <!-- Menu mobile -->
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <button class="navbar-toggler p-2 border-0" type="button" data-bs-toggle="collapse" href="#menu-mobile" role="button" aria-expanded="false" aria-controls="#menu-mobile">
                  <i class="fa-sharp fa-solid fa-bars fa-xl"></i>
                </button>
              </div>
            </div>
            <!-- Menu mobile -->

            <!-- cart Mobile-->
            <div>
              <a class="nav-link text-uppercase position-relative" href="cart.html"><i class="fa-sharp fa-solid fa-cart-shopping fa-xl tex"></i>
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
                    if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
                      echo sizeof($_SESSION["cart"]);
                    } else {
                      echo '0';
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
      " class="d-none d-md-block">
    <div class="collapse" id="search-pc">
      <div class="input-group">
        <input type="text" class="form-control border-dark" style="color: #7a7a7a" placeholder="Tìm kiếm sản phẩm" />
        <button class="btn btn-dark text-white">
          <i class="fa-solid fa-magnifying-glass fa-xl"></i>
        </button>
      </div>
    </div>
  </div>

  <!--Show cart sidebar-->

  <div class="offcanvas offcanvas-end rounded m-3" data-bs-scroll="false" data-bs-backdrop="true" tabindex="-1" id="menu-cart-shopping" aria-labelledby="menu-cart-shopping-label" style="height: 400px; width: 30%">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="menu-cart-shopping-label">Giỏ hàng</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="menu-cart-shopping-items">
      <div class="products">

        <?php
        if ((isset($_SESSION["cart"])) && (count($_SESSION["cart"]) > 0)) {
          $totalprice = 0;
          foreach ($_SESSION["cart"] as $item) {
            if (!empty($item[0])) {
              $totalprice += $item[3] * $item[4];
        ?>
              <div class="product card flex-row border-0 mb-3" style="height: 70px;"> <img src="../admincp/modules/Manage_Book/uploads/<?php echo $item[2] ?>" alt=" ..." style="width: 15%; padding-top: 16px; object-fit: contain" />
                <div class="card-body container" style="width: 84%">
                  <div class="row align-items-center">
                    <div class="card-text col-md-9 mb-0">
                      <p class="text-truncate mb-0">
                        <?php echo $item[1]  ?>
                      </p>
                      <div class="d-flex align-items-center gap-1">
                        <p class="fs-5 fw-bold mb-0" style="color: black">
                          <?php echo number_format($item[3], 0, ',', '.') . 'vnđ' ?>
                        </p>
                      </div>
                    </div>
                    <div class="col-md-2 justify-content-end price-in-card-cart"><span><?php echo $item[4] ?></span></div>
                    <div class="col-md-1"><a href="../pages/modules/handle-cart.php?want=delcartid&id=<?php echo $item[0]  ?>"><i class="fa-solid fa-xmark fa-xl"></i></a> </div>
                  </div>
                </div>
              </div>
          <?php }
          }
        } else { ?>
          <div>
            <h5>GIỎ HÀNG RỖNG</h5>
          </div>
        <?php } ?>

      </div>
    </div>
    <div class="offcanvas-footer" style="padding: 16px; padding-top: 0px">
      <div class="border-top position-relative opacity-1 py-2" id="total-cart">
        <span>Tổng tiền : <?php
                          if (isset($totalprice)) {
                            echo number_format($totalprice, 0, ',', '.') . 'vnđ';
                          } else {
                            echo '0';
                          }
                          ?></span>
      </div>
      <div class="">
        <div class="btn btn-dark"><a class="text-white" href="../index.php?page=cart">Mở giỏ hàng</a></div>
        <div class="btn btn-dark"><a class="text-white" href="../pages/modules/handle-cart.php?want=delcart">Xóa giỏ hàng</a></div>

        <div class="btn btn-primary">Thanh toán</div>
      </div>
    </div>
  </div>
  <!--Show Cart-->

  <!--Show Nav PC-->

  <!--Show Nav Mobile-->
  <div class="collapse multi-collapse under-header d-md-none" id="menu-mobile">
    <ul style="list-style: none">
      <li class="pb-1 pt-2">
        <a class="dropdown-item" href="#">Danh mục</a>
      </li>
      <li class="py-1"><a class="dropdown-item" href="#">Sản phẩm</a></li>
      <li class="py-1"><a class="dropdown-item" href="#">Sales</a></li>
      <li class="py-1"><a class="dropdown-item" href="#">Đăng nhập</a></li>
    </ul>
    <div class="py-1" style="padding-left: 32px">
      <div class="d-flex justify-content-start">
        <div class="input-group" style="width: 80%">
          <input type="text" class="form-control border-dark" style="color: #7a7a7a" placeholder="Tìm kiếm sản phẩm" />
          <button class="btn btn-dark text-white">
            <i class="fa-solid fa-magnifying-glass fa-xl"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--Show Nav Mobile-->

  <div class="offcanvas offcanvas-start rounded m-3" data-bs-scroll="false" data-bs-backdrop="true" tabindex="-1" id="category" aria-labelledby="category-label" style="height: 400px; width: 30%">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="category-label">Chọn thể loại sách</h5>
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
          <div class='p-2'><a class="text-black" href="../index.php?page=category&idcate=<?php echo $htmlspecialchars($row['MaTheLoai']) ?>"><?php echo $htmlspecialchars($row['TenTheLoai']) ?></a></div>
        <?php
        }
        ?>

      </div>
    </div>
  </div>