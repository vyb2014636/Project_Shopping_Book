<div class="offcanvas offcanvas-end rounded m-3" data-bs-scroll="false" data-bs-backdrop="true" tabindex="-1" id="menu-cart-shopping" aria-labelledby="menu-cart-shopping-label" style="height: 400px; width: 30%">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="menu-cart-shopping-label">Giỏ hàng</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" id="menu-cart-shopping-items">
    <div class="products">

      <?php
      if (isset($_SESSION["login"])) {
        $sum = 0;
        $totalprice = 0;
        $id_user = $_SESSION['login']['username'];
        $statement = $pdo->prepare("SELECT * FROM cart WHERE TenTaiKhoan LIKE '%$id_user%'");
        $statement->execute();
        $row_count = $statement->rowCount();
        $htmlspecialchars = 'htmlspecialchars';
        if ($row_count > 0) {
          while ($row = $statement->fetch()) {
            $sum += $htmlspecialchars($row['DonGia']) * $htmlspecialchars($row['SoLuong']);
      ?>
            <div class="product card flex-row border-0 mb-3" style="height: 70px;"> <img src="../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" alt=" ..." style="width: 15%; padding-top: 16px; object-fit: contain" />
              <div class="card-body container" style="width: 84%">
                <div class="row align-items-center">
                  <div class="card-text col-md-9 mb-0">
                    <p class="text-truncate mb-0">
                      <?php echo $htmlspecialchars($row['TenSach']) ?>
                    </p>
                    <div class="d-flex align-items-center gap-1">
                      <p class="fs-5 fw-bold mb-0" style="color: black">
                        <?php echo number_format($htmlspecialchars($row['DonGia']), 0, ',', '.') . 'vnđ' ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-md-2 justify-content-end price-in-card-cart"><span><?php echo $htmlspecialchars($row['SoLuong']) ?></span></div>
                  <div class="col-md-1"><a href="../pages/modules/handle-cart.php?want=delcartid&id=<?php echo $htmlspecialchars($row['MaSach'])  ?>"><i class="fa-solid fa-xmark fa-xl"></i></a> </div>
                </div>
              </div>
            </div>
          <?php }
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
                        if (isset($sum)) {
                          echo number_format($sum, 0, ',', '.') . 'vnđ';
                        } else {
                          echo '0';
                        }
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