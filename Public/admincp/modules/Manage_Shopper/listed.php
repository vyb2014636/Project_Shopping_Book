<?php
if (isset($_GET['act']) &&  $_GET['act'] == 'delete') {
  $id  = $_GET['id'];
  $sqls = "SELECT * FROM tbl_user WHERE id LIKE '%$id%' LIMIT 1";
  $statements = $pdo->prepare($sqls);
  $statements->execute();
  $rows = $statements->fetch();
  ///Đang làm xóa file
  unlink('../img/avatar_user/' . $rows["Hinh"]);
  $sql = "DELETE FROM tbl_user WHERE id LIKE '%$id%' LIMIT 1";
  $statement = $pdo->prepare($sql);
  $statement->execute();
  header("location:index.php?page=shopper&query=listed");
}
if (isset($_POST["search"]) && $_POST["search"]) {
  $keyword = $_POST["keyword"];
  $sql = "SELECT * FROM tbl_user WHERE Email LIKE ? OR TenNguoiDung LIKE ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["%$keyword%", "%$keyword%"]);
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (empty($rows)) {
    $rows = 'Not Found';
  }
} else {
  $sql = 'SELECT * FROM tbl_user WHERE role <>1';
  try {
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo '' . $e->getMessage() . '';
  }
}
?>

<div class="content" style="min-height: 100vh;">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header d-flex align-items-center justify-content-between">
            <strong class="card-title mb-0">Danh sách Đơn hàng</strong>
          </div>
          <div class="d-flex align-items-center justify-content-between" style="padding: .75rem 1.25rem;">
            <form action="" method="post" class="d-flex align-items-center" style="gap: 8px;">
              <input type="text" class="p-2 px-3" placeholder="Từ khóa tìm kiếm" name="keyword" autocomplete="off" id="keyword" style="border: 1px solid #ccc">
              <input type="submit" name="search" class="btn text-white py-2" value="Tìm kiếm" style="background-color: #38284f;">
            </form>
            <a href="index.php?page=shopper&query=listed"><i class="fa-solid fa-rotate-right p-2"></i></a>
          </div>
          <div class="table-stats order-table ov-h">
            <table class="table">
              <thead>
                <tr>
                  <th>Mã khách</th>
                  <th>Ảnh đại diện</th>
                  <th>Tên khách hàng</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Địa chỉ</th>
                  <th>Trạng thái</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if ($rows === 'Not Found') {
                ?>
                  <tr>
                    <td colspan="9" class="text-center">Không tìm thấy </td>
                  </tr>
                  <?php
                } else {
                  foreach ($rows as $row) {
                    $htmlspecialchars = 'htmlspecialchars';
                  ?>
                    <tr>
                      <td>#<?php echo $htmlspecialchars($row['id']); ?></td>
                      <td>
                        <img style="height: 50px;width: 80px; object-fit: cover;" src="../img/avatar_user/<?php echo $htmlspecialchars($row['Hinh']) ?>" alt="">
                      </td>


                      <td>
                        <span class="name text-truncate"><?php echo $htmlspecialchars($row['TenNguoiDung']) ?></span>
                      </td>
                      <td>
                        <span class="name"><?php echo $htmlspecialchars($row['Email']) ?></span>
                      </td>
                      <td>
                        <span class="name"><?php echo $htmlspecialchars($row['SoDienThoai']) ?></span>
                      </td>
                      <td>
                        <span class="name"><?php echo $htmlspecialchars($row['DiaChi']) ?></span>
                      </td>
                      <td>
                        <a class="text-dark" href="index.php?page=shopper&query=listed&act=delete&id=<?php echo $htmlspecialchars($row['id']) ?>"><i class="fa-solid fa-trash-can fa-lg"></i></a>
                      </td>
                    </tr>
                <?php
                  }
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