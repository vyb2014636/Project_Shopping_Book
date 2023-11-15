<?php
$userid = $_SESSION['login']['username'];
if (isset($_GET['id'])) {
  $idorder = $_GET['id'];
} else {
  $idorder = "";
}
try {
  $stmt = $pdo->prepare("SELECT * FROM cart WHERE TenTaiKhoan LIKE '%$userid%' AND MaDonHang =$idorder");
  $stmt->execute();
  $htmlspecialchars = 'htmlspecialchars';
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-xl-9">
      <div class="card">
        <div class="card-header p-3 " style="background-color: #38284f; outline: none;">
          <div class="d-flex align-items-center">
            <h5 class="card-title flex-grow-1 mb-0 text-white">Đơn hàng #<?php echo $idorder ?></h5>

          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive table-card">
            <table class="table table-nowrap align-middle table-borderless mb-0 border-none">
              <thead class="table-light text-muted ">
                <tr>
                  <th scope="col">Sản phẩm</th>
                  <th scope="col">Giá</th>
                  <th scope="col" class="text-center">Số lượng</th>
                  <th scope="col" class="text-end">Thành tiền</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($rows = $stmt->fetch()) { ?>
                  <tr>
                    <td>
                      <div class="d-flex">
                        <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                          <img src="../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($rows['HinhAnh']) ?>" alt="" class="img-fluid d-block" style="width:80px;height:100px">
                        </div>
                        <div class="flex-grow-1 ms-3 d-flex flex-column justify-content-center">
                          <h5 class="fs-14"><a href="apps-ecommerce-product-details.html" class="text-body"><?php echo $htmlspecialchars($rows['TenSach']) ?></a></h5>
                          <p class="text-muted mb-0">Thể loại: <span class="fw-medium">
                              <?php
                              $idcate = $htmlspecialchars($rows['MaTheLoai']);
                              $sqlt = "SELECT TenTheLoai FROM category where MaTheLoai LIKE '%$idcate%' LIMIT 1 ";
                              $statementst = $pdo->prepare($sqlt);
                              $statementst->execute();
                              $rowst = $statementst->fetch();
                              echo $htmlspecialchars($rowst['TenTheLoai']) ?>
                            </span></p>
                        </div>
                      </div>
                    </td>
                    <td><?php echo number_format($htmlspecialchars($rows['DonGia']), 0, ',', '.')  ?></td>
                    <td class="text-center"><?php echo $htmlspecialchars($rows['SoLuong']) ?></td>

                    <td class="fw-medium text-end">
                      <?php echo number_format($htmlspecialchars($rows['DonGia']) * $htmlspecialchars($rows['SoLuong']), 0, ',', '.')  ?>
                    </td>
                  </tr>

                <?php } ?>
                <?php try {
                  $stmtt = $pdo->prepare("SELECT * FROM payment WHERE TKKhachHang LIKE '%$userid%' AND id =$idorder");
                  $stmtt->execute();
                  $htmlspecialchars = 'htmlspecialchars';
                } catch (PDOException $e) {
                  echo $e->getMessage();
                }
                while ($rowt = $stmtt->fetch()) { ?>
                  <tr class="border-top border-top-dashed">
                    <td colspan="3"></td>
                    <td colspan="2" class="fw-medium p-0">
                      <table class="table table-borderless mb-0">
                        <tbody>
                          <tr>
                            <td>Tổng tiền :</td>
                            <td class="text-end"><?php echo number_format($htmlspecialchars($rowt['TongTien']), 0, ',', '.') . ' vnđ' ?></td>
                          </tr>

                          <tr>
                            <td>Phí vận chuyển :</td>
                            <td class="text-end">$65.00</td>
                          </tr>
                          <tr>
                            <td>Estimated Tax :</td>
                            <td class="text-end">0</td>
                          </tr>
                          <tr class="border-top border-top-dashed">
                            <th scope="row">Tổng :</th>
                            <th class="text-end"><?php echo number_format($htmlspecialchars($rowt['TongTien']), 0, ',', '.') . ' vnđ' ?> </th>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--end card-->
      <!--end card-->
    </div>
    <!--end col-->
    <div class="col-xl-3">

      <!--end card-->

      <div class="card mb-2">
        <div class="card-header">
          <div class="d-flex">
            <h5 class="card-title flex-grow-1 mb-0">Chi tiết khách hàng</h5>
            <div class="flex-shrink-0">
              <a href="javascript:void(0);" class="link-secondary"></a>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <ul class="list-unstyled mb-0 vstack gap-3">
            <li>
              <div class="d-flex align-items-center">

                <div class="flex-grow-1 ms-3">
                  <h6 class="fs-14 mb-1"><?php echo $htmlspecialchars($rowt['TenKhachHang']) ?></h6>
                  <p class="text-muted mb-0">Khách hàng</p>
                </div>
              </div>
            </li>
            <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i><?php echo $htmlspecialchars($rowt['Email']) ?></li>
            <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i><?php echo $htmlspecialchars($rowt['SoDienThoai']) ?></li>
          </ul>
        </div>
      </div>
      <!--end card-->

      <!--end card-->
      <div class="card mb-3">
        <div class="card-header">
          <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Địa chỉ giao hàng</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
            <li class="fw-medium fs-14"><?php echo $htmlspecialchars($rowt['TenKhachHang']) ?></li>
            <li><?php echo $htmlspecialchars($rowt['SoDienThoai']) ?></li>
            <li><?php echo $htmlspecialchars($rowt['DiaChi']) ?></li>
            <li>Vietnamese</li>
          </ul>
        </div>
      </div>
      <!--end card-->

      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i> Chi tiết thanh toán</h5>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <div class="flex-shrink-0">
              <p class="text-muted mb-0">Mã Đơn hàng</p>
            </div>
            <div class="flex-grow-1 ms-2">
              <h6 class="mb-0">#<?php echo $idorder ?></h6>
            </div>
          </div>
          <div class="d-flex align-items-center mb-2">
            <div class="flex-shrink-0">
              <p class="text-muted mb-0">Phương thức thanh toán:</p>
            </div>
            <div class="flex-grow-1 ms-2">
              <h6 class="mb-0">Thanh toán khi nhận hàng</h6>
            </div>
          </div>


          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <p class="text-muted mb-0">Tổng thu:</p>
            </div>
            <div class="flex-grow-1 ms-2">
              <h6 class="mb-0"><?php echo number_format($htmlspecialchars($rowt['TongTien']), 0, ',', '.') . ' vnđ' ?></h6>
            </div>
          </div>
        </div>
      </div>
      <!--end card-->
    </div>
    <!--end col-->
  </div>
  <!--end row-->
<?php } ?>
</div>