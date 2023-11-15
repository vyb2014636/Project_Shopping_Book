<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['update-status'])) {
    if (isset($_POST['status'])) {
      $status = $_POST['status'];
      $id_order = $_POST['id-order'];
      $id_order_new = (int)$id_order;
      $sql = "UPDATE payment SET TrangThai = '$status' WHERE id = '$id_order_new'";
      $statement = $pdo->prepare($sql);
      $statement->execute();
?>
      <script>
        Swal.fire({
          icon: "success",
          title: "Thành công",
          text: "cập nhật thành công",
        }).then(function() {
          window.location.href = 'index.php?page=order&query=listed';
        });
      </script>
  <?php
      exit;
    }
  }
}


$sql = 'SELECT * FROM payment';
try {
  $statement = $pdo->prepare($sql);
  $statement->execute();
  // $result = $statement->fetchALL(PDO::FETCH_ASSOC);
  ?>

  <div class="content" style="min-height: 100vh;">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
              <strong class="card-title mb-0">Danh sách Đơn hàng</strong>
            </div>
            <!-- <div class="d-flex align-items-center justify-content-between" style="padding: .75rem 1.25rem;">
              <form action="" method="post" class="d-flex align-items-center" style="gap: 8px;">
                <input type="text" class="p-2 px-3" placeholder="Từ khóa tìm kiếm" name="keyword" autocomplete="off" id="keyword" style="border: 1px solid #ccc">
                <input type="submit" name="search" class="btn text-white py-2" value="Tìm kiếm" style="background-color: #28a745;">
              </form>
              <a href="/index.php?page=products&act=list"><i class="fa-solid fa-rotate-right p-2"></i></a>
            </div> -->
            <div class="table-stats order-table ov-h">
              <table class="table">
                <thead>
                  <tr>
                    <th>Mã đơn</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>

                    <th>Số sản phẩm</th>
                    <th>Phí vận chuyển</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = $statement->fetch()) {
                    $htmlspecialchars = 'htmlspecialchars';
                  ?>
                    <tr>
                      <td>#<?php echo $htmlspecialchars($row['id']); ?></td>
                      <td>
                        <span class="name"><?php echo $htmlspecialchars($row['TenKhachHang']) ?></span>
                      </td>


                      <td>
                        <span class="name text-truncate"><?php echo $htmlspecialchars($row['DiaChi']) ?></span>
                      </td>
                      <td>
                        <span class="name"><?php echo $htmlspecialchars($row['SoDienThoai']) ?></span>
                      </td>
                      <td>
                        <span class="name"><?php echo $htmlspecialchars($row['TongSP']) ?></span>
                      </td>
                      <td>
                        <span class="name"><?php echo $htmlspecialchars($row['Ship']) ?></span>
                      </td>
                      <td>
                        <span class="name"><?php echo $htmlspecialchars($row['TongTien']) ?></span>
                      </td>
                      <td>
                        <form action="" method="post">
                          <div class='d-flex'>
                            <div>
                              <select class="form-select" name="status">
                                <?php for ($i = 0; $i < 3; $i++) {
                                  if ($i == $htmlspecialchars($row['TrangThai'])) { ?>
                                    <option selected value="<?php echo $i ?>">
                                      <span class='count'>
                                        <?php
                                        if ($i == 0) {
                                          echo 'Chờ xác nhận';
                                        } elseif ($i == 1) {
                                          echo 'Đang giao';
                                        } else {
                                          // $tmp1 = 1;
                                          echo 'Đã giao';
                                        }   ?>
                                      </span>
                                    </option>
                                  <?php } else { ?>
                                    <option value="<?php echo $i ?>">
                                      <span class='count'>
                                        <?php
                                        if ($i == 0) {
                                          echo 'Chờ xác nhận';
                                        } elseif ($i == 1) {
                                          echo 'Đang giao';
                                        } else {
                                          // $tmp1 = 1;
                                          echo 'Đã giao';
                                        }   ?>
                                      </span>
                                    </option>
                                <?php }
                                } ?>
                              </select>
                            </div>
                            <input type="hidden" name='id-order' value='<?php echo $htmlspecialchars($row['id']); ?>' class='btn btn-primary'>
                            <input type="submit" name='update-status' value='UP' class='btn btn-primary'>
                          </div>
                        </form>
                      </td>

                      <td>
                        <a class="text-dark" href="?page=order&query=detail&id=<?php echo $htmlspecialchars($row['id']) ?>"> <i class="fa-solid fa-pen fa-lg"></i></a>
                      </td>
                    </tr>
                <?php
                  }
                } catch (PDOException $e) {
                  echo '' . $e->getMessage() . '';
                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>