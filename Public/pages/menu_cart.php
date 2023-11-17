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
        <div style="transform: translateY(50%);">
          <div class="empty-state d-flex flex-column align-items-center justify-content-center">
            <div class="empty-state__icon-wrapper position-relative">
              <svg role="presentation" stroke-width="1" focusable="false" width="32" height="32" class="icon icon-cart" viewBox="0 0 22 22">
                <path d="M11 7H3.577A2 2 0 0 0 1.64 9.497l2.051 8A2 2 0 0 0 5.63 19H16.37a2 2 0 0 0 1.937-1.503l2.052-8A2 2 0 0 0 18.422 7H11Zm0 0V1" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
              <span class="position-absolute rounded-circle text-center" style="
                 width: 20px;
                      height: 22px;
                      top: -10px;
                      right: -10px;
                      background-color: #38284f;
                      color: white;
                      align-items: center
              ">0</span>
            </div>

            <div class="prose">
              <p class="h5">Chưa có sản phẩm</p>
              <a class="btn " href="index.php" style="background-color: #38284f;color: white;">Tiếp tục mua hàng</a>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
  <?php if ((isset($_SESSION["cart"])) && (count($_SESSION["cart"]) > 0)) { ?>
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

        <div class="btn " style="background-color: #38284f;color: white;">Thanh toán</div>
      </div>
    </div>
  <?php } ?>
</div>