<?php
if (isset($_GET["idbook"])) {
  $idbook = $_GET["idbook"];
} else {
  $idbook = "";
}

$sql = "SELECT * FROM book WHERE MaSach LIKE '%$idbook%'";
try {
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $htmlspecialchars = 'htmlspecialchars';
} catch (PDOException $e) {
  echo $e->getMessage();
}


?>

<main class="bg-light pt-4 rounded">
  <?php
  while ($row = $statement->fetch()) { ?>
    <!--San pham  -->
    <div class="container bg-white">
      <form action="pages/modules/handle-cart.php" method="POST">
        <div class="row pt-2">
          <div class="col-md-4">
            <!-- Hình sản phẩm -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>

              </div>
              <div class="carousel-inner" style="width: 100%; ">
                <div class="carousel-item active">
                  <img src="../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" class="d-block w-100" alt="..." style="">
                </div>
                <div class="carousel-item">
                  <img src="../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh2']) ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh3']) ?>" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <!-- Tên Sp -->
          <div class="col-md-8">
            <div class="ps-md-3">
              <h3 class="title text-dark">
                <?php echo $htmlspecialchars($row['TenSach']) ?>
              </h3>
              <div class="row pt-4">
                <div class="col-md-6 col-6">
                  <p>Nhà cung cấp: <strong>VN123</strong> </p>
                </div>
                <div class="col-md-6 col-6">
                  <p>Tác giả: <strong><?php echo $htmlspecialchars($row['TacGia']) ?></strong></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-6">
                  <p>NXB: <strong><?php echo $htmlspecialchars($row['NhaXB']) ?></strong> </p>
                </div>
                <div class="col-md-6 col-6">
                  <p>Hình thức bìa: <strong>Bìa Mềm</strong></p>
                </div>
              </div>
              <div class="d-flex flex-row">
                <span class="ms-1">
                  <p>5.0 &nbsp;</p>
                </span>
                <div class="text-warning mb-1 me-2">
                  <i class="fa-solid fa-star fa-xs"></i>
                  <i class="fa-solid fa-star fa-xs"></i>
                  <i class="fa-solid fa-star fa-xs"></i>
                  <i class="fa-solid fa-star fa-xs"></i>
                  <i class="fas fa-star-half-alt fa-xs"></i>

                </div>
                <span class="text-warning">(50 đánh giá)</span>
              </div>

              <?php if ($htmlspecialchars($row['MaTheLoai']) == "EDU") { ?>
                <div class="mb-3 d-flex align-items-center">
                  <h2><?php echo number_format($htmlspecialchars($row['DonGia'] - $row['DonGia'] * 0.15), 0, ',', '.') ?>&nbsp;vnđ</h2>
                  <p class="old-price mb-0 ms-2">
                    <span class="price text-decoration-line-through" id="old-price-408802"><?php echo number_format($htmlspecialchars($row['DonGia']), 0, ',', '.') ?>&nbsp;vnđ</span>
                    <span class="discount-percent" style="background-color: #38284f; color:white; border-radius: 5px; padding:0 3px;">-15%</span>
                  </p>
                </div>
              <?php } else { ?>
                <div class="mb-3 d-flex align-items-center">
                  <h2><?php echo number_format($htmlspecialchars($row['DonGia']), 0, ',', '.') ?>&nbsp;vnđ</h2>
                </div>
              <?php } ?>
              <div class="row">
                <div class="col-md-4 col-4">
                  <p>Chính sách đổi trả: </p>
                </div>
                <div class="col-md-8 col-8">
                  <p>Đổi trả sản phẩm trong 30 ngày <a href="" class="text-decoration-none">Xem
                      thêm</a></p>
                </div>
              </div>


              <hr />

              <div class="row">
                <div class="col-md-3 col-5">
                  <p><strong>Số lượng: </strong></p>
                </div>
                <div class="col-md-7 col-7">
                  <input type="number" step="1" min="1" max="100" value="1" name="quantity" class="quantity-field border rounded  text-center w-25">
                </div>
              </div>
              <div class="pt-4 d-block">
                <a href="#" class="button text-white rounded" style=" padding: 15px 69px; background-color: #38284f;">Mua Ngay</a>
                <button type="submit" class="button text-white rounded text-decoration-none" name="add-cart-quantity" style="cursor: pointer; padding: 13px 32px; background-color: #38284f;" value=1>
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-cart-plus fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp;</button>
              </div>
            </div>
          </div>
        </div>
        <input type="hidden" name="id-book" value="<?php echo $htmlspecialchars($row['MaSach']) ?>">
        <input type="hidden" name="img-book" value="<?php echo $htmlspecialchars($row['HinhAnh']) ?>">
        <input type="hidden" name="name-book" value="<?php echo $htmlspecialchars($row['TenSach']) ?>">
        <?php if ($htmlspecialchars($row['MaTheLoai']) === 'EDU') { ?>
          <input type="hidden" name="price-book" value="<?php echo $htmlspecialchars($row['DonGia'] - $row['DonGia'] * 0.15) ?>">
        <?php } else { ?>
          <input type="hidden" name="price-book" value="<?php echo $htmlspecialchars($row['DonGia']) ?>">
        <?php } ?>
        <input type="hidden" name="MaSach" value="<?php echo $htmlspecialchars($row['MaSach']) ?>">
        <input type="hidden" name="MaTheLoai" value="<?php echo $htmlspecialchars($row['MaTheLoai']) ?>">
      </form>
    </div>
  <?php } ?>

</main>