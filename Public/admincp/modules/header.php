<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="Public/css/style.css" />
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
            <span class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><i class="fa-solid fa-envelope fa-xl"></i>
              <strong>loi@gmail.com</strong></span>
            <span class="me-3"><i class="fa-solid fa-phone fa-xl"></i>
              <strong>SDT:123123</strong></span>
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
            <a class="navbar-brand m-0 text-center" href="#"><strong>NAME SHOP </strong></a>
          </div>
          <!--/-->

          <!---->
          <div class="navbar-nav col-md-8 d-md-flex d-none align-items-center justify-content-center p-0" id="nav-category-1">
            <div class="nav-item link-nav">
              <a class="nav-link link-nav-item text-uppercase" aria-current="page" href="index.php?page=category"><span>Danh Mục<after></after></span></a>
            </div>
            <div class="nav-item link-nav">
              <a class="nav-link link-nav-item text-uppercase" aria-current="page" href="index.php?"><span>Giới thiệu<after></after></span></a>
            </div>

            <div class="nav-item link-nav">
              <a class="nav-link link-nav-item text-uppercase" href="index.php?page=books"><span>Sản phẩm<after></after></span></a>
            </div>
          </div>
          <!--/-->

          <!---->
          <div class="navbar-nav col-md-2 d-md-flex d-none align-items-center justify-content-end p-0">


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

  </div>
  <!--Show Nav Mobile-->