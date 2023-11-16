<?php
if (isset($_SESSION["login"])) {
  try {
    $userid = $_SESSION['login']['username'];
    $stmt = $pdo->prepare("SELECT * FROM payment WHERE TKKhachHang LIKE '%$userid%'");
    $stmt->execute();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  if (!isset($_SESSION['order'])) {
    $_SESSION['order'] = [];
  }
  unset($_SESSION['order']);
  while ($row = $stmt->fetch()) {
    $_SESSION['order'][] = $row['id'];
  }
} ?>

<main class="px-2">
  <div class="container pt-3 px-0">
    <div class="p-3 mb-2" style="width: 100%;background-color: #38284f;">
      <i class="fa-solid fa-cart-shopping fa-xl text-white"></i>
      <span class="text-white">Đơn hàng của bạn</span>
    </div>

    <?php
    if (isset($_SESSION['order']) && isset($_SESSION['login'])) {
      for ($i = 0; $i < sizeof($_SESSION['order']); $i++) { ?>
        <div class="container pt-3 px-0">
          <div class="card row m-0 " style="background-color: #FFFFFF;">
            <?php
            try {
              $itemoder = $_SESSION['order'][$i];
              $stmto = $pdo->prepare("SELECT * FROM cart WHERE TenTaiKhoan LIKE '%$userid%' AND MaDonHang = $itemoder LIMIT 1");
              $stmto->execute();
              $htmlspecialchars = 'htmlspecialchars';
            } catch (PDOException $e) {
              echo $e->getMessage();
            }
            while ($row = $stmto->fetch()) {
            ?>
              <div class="card product" style="border: none;">
                <div class="card-body">
                  <div class="row gy-3">
                    <div class="col-sm-auto">
                      <div class="avatar-lg bg-light rounded p-1">
                        <img src="../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" alt="" class="img-fluid d-block" style="height: 100px;width: 80px;">
                      </div>
                    </div>
                    <div class="col-sm">
                      <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-body"><?php echo $htmlspecialchars($row['TenSach']) ?></a></h5>
                      <ul class="list-inline text-muted">
                        <li class="list-inline-item">Thể loại : <span class="fw-medium">
                            <?php
                            $idcate = $htmlspecialchars($row['MaTheLoai']);
                            $sqlt = "SELECT TenTheLoai FROM category where MaTheLoai LIKE '%$idcate%' LIMIT 1 ";
                            $statementst = $pdo->prepare($sqlt);
                            $statementst->execute();
                            $rowst = $statementst->fetch();
                            echo $htmlspecialchars($rowst['TenTheLoai']) ?></span></li>
                      </ul>


                    </div>
                    <div class="col-sm-auto">
                      <div class="text-lg-end">
                        <h5 class="fs-14"><span id="ticket_price" class="product-price"><?php echo number_format($htmlspecialchars($row['DonGia']), 0, ',', '.') . ' vnđ' ?></span></h5>
                      </div>
                    </div>
                  </div>
                  <?php
                  try {
                    $stmt3 = $pdo->prepare("SELECT * FROM payment WHERE TKKhachHang LIKE '%$userid%' AND id = $itemoder LIMIT 1");
                    $stmt3->execute();
                    $htmlspecialchars = 'htmlspecialchars';
                    $rowst = $statementst->fetch();
                  } catch (PDOException $e) {
                    echo $e->getMessage();
                  }
                  while ($rowst =  $stmt3->fetch()) {
                    if ($htmlspecialchars($rowst['TrangThai']) == 0) {
                  ?>
                      <div class='d-flex justify-content-end'><span>Đang xác nhận</span></div>
                    <?php } elseif ($htmlspecialchars($rowst['TrangThai']) == 1) { ?>
                      <div class='d-flex justify-content-end align-items-center'><i class="fa-solid fa-truck"></i>&nbsp;<span>Đang giao hàng</span></div>
                    <?php } else { ?>
                      <div class='d-flex justify-content-end'><span>Đã giao</span></div>
                    <?php } ?>
                </div>
                <!-- card body -->
                <div class="card-footer bg-white">
                  <div class="row align-items-center gy-3">
                    <div class="col-sm ">
                      <div class="d-flex align-items-center gap-2 text-muted">
                        <div>Tổng Tiền :</div>
                        <h5 class="fs-14 mb-0"><span class="product-line-price">
                            <?php
                            echo  number_format($htmlspecialchars($rowst['TongTien']), 0, ',', '.') . ' vnđ';
                            ?></span>
                        </h5>
                      </div>
                    </div>
                    <div class="col-sm-auto">
                      <div class="d-flex flex-wrap my-n1">
                        <div class='d-flex justify-content-end align-items-center'>
                          <?php if ($htmlspecialchars($rowst['TrangThai']) == 2) { ?>
                            <a href="../index.php?page=orderdetail&id=<?php echo $htmlspecialchars($rowst['id']); ?>" class="d-block text-white rounded-pill p-1 px-2 " data-bs-toggle="modal" style="background-color:#38284f">
                              Đã nhận hàng </a>&nbsp;
                          <?php } else {
                          ?>
                            <span class="disabled d-block text-white rounded-pill p-1 px-2 " data-bs-toggle="modal" style="background-color:#38284f">
                              Chưa nhận hàng </span>&nbsp;
                          <?php
                          } ?>
                          <a href="../index.php?page=orderdetail&id=<?php echo $htmlspecialchars($rowst['id']); ?>" class="d-block text-white rounded-pill p-1 px-2 " data-bs-toggle="modal" style="background-color:#38284f">
                            Xem chi tiết </a>
                        </div>
                      <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>

        </div>
  <?php }
          }
        } else {
          echo 'KHÔNG CÓ ĐƠN HÀNG NÀO';
        } ?>
</main>