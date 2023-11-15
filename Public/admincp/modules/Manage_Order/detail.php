<?php
if (isset($_GET["query"]) && $_GET["query"] == 'detail') {
  $detail_id = $_GET["id"];
} else {
  $detail_id = "";
}
$sql = "SELECT * FROM cart WHERE MaDonHang='$detail_id'";
try {
  $statement = $pdo->prepare($sql);
  $statement->execute();
?>




  <div class="content" style="min-height: 100vh;">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
              <strong class="card-title mb-0">Danh sách sản phẩm của đơn: <?php echo '#' . $detail_id ?></strong>
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
                    <th>Mã sách</th>
                    <th>Tên sách</th>
                    <th>Hình ảnh</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Mã thể loại</th>

                    <th class="text-center">Xóa|Sửa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = $statement->fetch()) {
                    $htmlspecialchars = 'htmlspecialchars';
                  ?>
                    <tr>
                      <td>#<?php echo $htmlspecialchars($row['MaDonHang']) ?></td>

                      <td><?php echo $htmlspecialchars($row['MaSach']) ?></td>
                      <td><?php echo $htmlspecialchars($row['TenSach']) ?></td>

                      <td><img style="height: 70px; object-fit: cover;" src="modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" alt=""></td>

                      <td><?php echo $htmlspecialchars($row['DonGia']) ?></td>
                      <td><?php echo $htmlspecialchars($row['SoLuong']) ?></td>

                      <td><?php echo $htmlspecialchars($row['MaTheLoai']) ?></td>



                      <td class="text-center">
                        <a class="text-dark" href="modules/Manage_Book/handle.php?query=delete&id=<?php echo $htmlspecialchars($row['MaSach']) ?>"><i class="fa-solid fa-trash-can fa-lg"></i></a> |
                        <a class="text-dark" href="?page=books&query=edit&id=<?php echo $htmlspecialchars($row['MaSach']) ?>"> <i class="fa-solid fa-pen fa-lg"></i></a>
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
          <div class="mb-2">
            <a href="?page=order&query=listed"><i class="fa-solid fa-arrow-left-long mx-2"></i>Quay lại trang trước</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>