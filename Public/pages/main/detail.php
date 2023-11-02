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
                  <img src="../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" class="d-block w-100" alt="...">
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

              <div class="mb-3">
                <h1><?php echo number_format($htmlspecialchars($row['DonGia']), 0, ',', '.') ?>&nbsp;vnđ</h1>
              </div>

              <p class="text-muted" style="font-size: 15px;">
                <?php echo $htmlspecialchars($row['NoiDung']) ?>
              </p>
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
        <input type="hidden" name="id-book" value="<?php echo $htmlspecialchars($row['HinhAnh']) ?>">
        <input type="hidden" name="img-book" value="<?php echo $htmlspecialchars($row['HinhAnh']) ?>">
        <input type="hidden" name="name-book" value="<?php echo $htmlspecialchars($row['TenSach']) ?>">
        <input type="hidden" name="price-book" value="<?php echo $htmlspecialchars($row['DonGia']) ?>">
        <input type="hidden" name="MaSach" value="<?php echo $htmlspecialchars($row['MaSach']) ?>">
        <input type="hidden" name="MaTheLoai" value="<?php echo $htmlspecialchars($row['MaTheLoai']) ?>">
      </form>
    </div>
    <div class="container bg-white my-3 pt-3 text-muted">
      <h4>Thông tin sản phẩm</h4>
      <div class="row">
        <div class="col-md-4 col-6">
          <p>Mã hàng: </p>
          <p>Nhà Cung Cấp: </p>
          <p>Tác giả: </p>
          <p>NXB: </p>
          <p>Năm XB: </p>
          <p>Ngôn Ngữ: </p>
          <p>Trọng lượng (gr): </p>
          <p>Kích Thước: </p>
          <p>Số trang</p>
          <p>Hình thức:</p>

        </div>

        <div class="col-md-8 col-6 ">
          <!-- Mã hàng -->
          <p>9780008116606</p>
          <!-- Nhà cung cấp -->
          <p>VietNam</p>
          <!-- Tac Giả -->
          <p>Loi</p>
          <!-- NXB -->
          <p>Thiếu niên nhi đồng</p>
          <!-- Năm XB:  -->
          <p>1945</p>
          <!-- Ngôn Ngữ-->
          <p>Tiếng Việt</p>
          <!--Trọng lượng (gr) -->
          <p>250</p>
          <!--Kích thước-->
          <p>15.7 x 11.6 x 1.7 cm</p>
          <!-- Số trang -->
          <p>160</p>
          <!--Hình thức -->
          Bìa Cứng
        </div>
        <div>
          <p>
            Sau hơn nửa thế kỷ, những trang thư "có lửa" từ chiến trường một lần nữa trở về, thành "những
            con
            chữ không im lặng" để kể về khí phách Việt Nam trong quá khứ hào hùng và cả thời đại mà chúng ta
            đang sống.</p>
        </div>
      </div>
    </div>

    <div class="container my-3 pt-3 bg-white">
      <h4>Đánh giá sản phẩm</h4>
      <!-- Tỉ lệ  -->
      <div class="row pt-4">
        <div class="col-md-4 col-4">
          <div>
            <span style="font-size: 60px;">4.5/</span><span style="font-size: 30px;">5 &nbsp;</span>

            <span class="text-warning">
              <i class="fa-solid fa-star fa-lg"></i>
              <i class="fa-solid fa-star fa-lg"></i>
              <i class="fa-solid fa-star fa-lg"></i>
              <i class="fa-solid fa-star fa-lg"></i>
              <i class="fa-solid fa-star fa-lg"></i></span>
          </div>
          <i>
            Đây là thông tin người mua đánh giá shop bán sản phẩm này có đúng mô tả không.
          </i>
        </div>


        <div class="col-md-4 col-8">
          <div class="row">
            <div class="col-md-4 col-5 my-2 pt-1">
              <!-- 5 -->
              <div class="text-warning pt-1">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
              </div>
              <!-- 4 -->
              <div class="text-warning pt-1">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-regular fa-star"></i>
              </div>
              <!-- 3 -->
              <div class="text-warning pt-1">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
              <!-- 2 -->
              <div class="text-warning pt-1">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star "></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
              <!-- 1 -->
              <div class="text-warning pt-1">
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
            </div>
            <div class="col-md-8 col-7 my-2 pt-1">
              <div class="pt-1">
                <div class="progress my-1">
                  <div class="progress-bar " style="width: 35%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="pt-1">
                <div class="progress my-1">
                  <div class="progress-bar " style="width: 35%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="pt-1">
                <div class="progress my-1">
                  <div class="progress-bar " style="width: 35%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="pt-1">
                <div class="progress my-1">
                  <div class="progress-bar " style="width: 35%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="pt-1">
                <div class="progress my-1">
                  <div class="progress-bar " style="width: 35%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 d-flex justify-content-center align-items-center my-3 ">
          <button type="button" class="btn text-white" style="width: 50%; background-color: #38284f;" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-pen"></i>
            Viết đánh giá
            <!--Viết ddanhs giá -->
          </button>
          <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
              <div class="modal-content ">
                <div class="modal-header ">
                  <h5 class="modal-title " id="exampleModalLabel"><STRONG>VIẾT ĐÁNH GIÁ SẢN PHẨM</STRONG></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="mb-3 text-warning text-center">
                      <i class="fa-regular fa-star fa-lg"></i>
                      <i class="fa-regular fa-star fa-lg"></i>
                      <i class="fa-regular fa-star fa-lg"></i>
                      <i class="fa-regular fa-star fa-lg"></i>
                      <i class="fa-regular fa-star fa-lg"></i>

                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Message:</label>
                      <textarea class="form-control" id="message-text"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Send message</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <hr>
      <!-- Binh Luan -->
      <!-- Cmt1 -->
      <div class="p-3 mb-2">
        <div class="d-flex flex-row">
          <img src="../img/register.webp" height="50" width="50" class="rounded-circle">
          <div class="ms-2">
            <h6 class="mb-1 text-primary">Luong Hai Dang</h6>
            <i class="text-warning fa fa-star fa-sm"></i>
            <i class="text-warning fa-regular fa-star fa-sm"></i>
            <i class="text-warning fa-regular fa-star fa-sm"></i>
            <i class="text-warning fa-regular fa-star fa-sm"></i>
            <i class="text-warning fa-regular fa-star fa-sm"></i>
            <p class="comment-text">Sản phẩm như là cái gì....</p>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <div class="d-flex flex-row gap-3 align-items-center">
            <div class="d-flex align-items-center">
              <i class="fa-solid fa-thumbs-up"></i>
              <span class="ms-1 fs-10">Like</span>
            </div>


          </div>
          <div class="d-flex flex-row">
            <span class="text-muted fw-normal fs-10">29-10-2023
              PM</span>
          </div>
        </div>
      </div>

      <hr>
      <!-- Cmt2 -->
      <div class="p-3 mb-2">
        <div class="d-flex flex-row">
          <img src="../img/register.webp" height="50" width="50" class="rounded-circle">
          <div class="ms-2">
            <h6 class="mb-1 text-primary">Luong Hai Dang</h6>
            <i class="text-warning fa fa-star fa-sm"></i>
            <i class="text-warning fa-regular fa-star fa-sm"></i>
            <i class="text-warning fa-regular fa-star fa-sm"></i>
            <i class="text-warning fa-regular fa-star fa-sm"></i>
            <i class="text-warning fa-regular fa-star fa-sm"></i>


            <p class="comment-text ">SSản phẩm như là cái gì....</p>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <div class="d-flex flex-row gap-3 align-items-center">
            <div class="d-flex align-items-center">
              <i class="fa-solid fa-thumbs-up"></i>
              <span class="ms-1 fs-10">Like</span>
            </div>

          </div>
          <div class="d-flex flex-row">
            <span class="text-muted fw-normal fs-10">29-10-2023
              PM</span>
          </div>
        </div>
      </div>


    </div>

    </div>

  <?php } ?>

</main>