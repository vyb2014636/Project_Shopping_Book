<?php
if (isset($_SESSION["cart"])) {
  foreach ($_SESSION["cart"] as $item) {
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
                <?php echo number_format($item[2], 0, ',', '.') . 'vnđ' ?>
              </p>
            </div>
          </div>
          <div class="col-md-2 justify-content-end price-in-card-cart"><input type="number" value="<?php echo $item[4] ?>" style="width: 100%" /></div>
          <div class="col-md-1"><i class="fa-solid fa-xmark fa-xl"></i> </div>
        </div>
      </div>
    </div>
  <?php }
} else { ?>
  <div>
    <h5>GIỎ HÀNG RỖNG</h5>
  </div>
<?php } ?>