<?php
$sql = "SELECT COUNT(*) SL_SP
FROM book";
$statement = $pdo->prepare($sql);
$statement->execute();
$quantitybook = $statement->fetch()[0];
// Số lượng khách hàng
$sql = "SELECT COUNT(*) SL_KH
FROM tbl_user
WHERE role <> 1";
$statement = $pdo->prepare($sql);
$statement->execute();
$quantityuser = $statement->fetch()[0];

$sql = "SELECT SUM(TongTien) DoanhThu
FROM payment
WHERE TrangThai=2";
$statement = $pdo->prepare($sql);
$statement->execute();
$totaldt = $statement->fetch()[0];

$sql = "SELECT COUNT(*) VanChuyen
FROM payment
WHERE TrangThai=2";
$statement = $pdo->prepare($sql);
$statement->execute();
$tranport = $statement->fetch()[0];

$htmlspecialchars = 'htmlspecialchars';
?>




<div class="content" style="min-height: 100vh;">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <a href="/index.php?statistics=price" class="card statistics">
          <div class="card-body">
            <div class="stat-widget-five">
              <div class="stat-icon dib flat-color-1">
                <i class="pe-7s-cash"></i>
              </div>
              <div class="stat-content">
                <div class="text-left dib">
                  <div class="stat-text">
                    <span class="count">
                      <?php echo $htmlspecialchars($totaldt)  ?>
                    </span> vnđ
                  </div>
                  <div class="stat-heading">Doanh thu</div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-6">
        <a href="/index.php?statistics=product" class="card statistics">
          <div class="card-body">
            <div class="stat-widget-five">
              <div class="stat-icon dib flat-color-2">
                <i class="pe-7s-cart"></i>
              </div>
              <div class="stat-content">
                <div class="text-left dib">
                  <div class="stat-text">
                    <span class="count"><?php echo $htmlspecialchars($quantitybook) ?></span>
                  </div>
                  <div class="stat-heading">Sản phẩm</div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-6">
        <a href="/index.php?statistics=transport" class="card statistics">
          <div class="card-body">
            <div class="stat-widget-five">
              <div class="stat-icon dib flat-color-3">
                <i class="pe-7s-star"></i>
              </div>
              <div class="stat-content">
                <div class="text-left dib">
                  <div class="stat-text">
                    <span class="count"><?php echo $htmlspecialchars($tranport) ?></span>
                  </div>
                  <div class="stat-heading">Vận chuyển</div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-6">
        <a href="/index.php?statistics=customer" class="card statistics">
          <div class="card-body">
            <div class="stat-widget-five">
              <div class="stat-icon dib flat-color-4">
                <i class="pe-7s-users"></i>
              </div>
              <div class="stat-content">
                <div class="text-left dib">
                  <div class="stat-text">
                    <span class="count"><?php echo $quantityuser ?></span>

                  </div>
                  <div class="stat-heading">Khách hàng</div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>