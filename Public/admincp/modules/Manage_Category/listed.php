<?php
if (isset($_POST["search"]) && $_POST["search"]) {
  $keyword = $_POST["keyword"];
  $sql = "SELECT * FROM category WHERE MaTheLoai LIKE ? OR TenTheLoai LIKE ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["%$keyword%", "%$keyword%"]);
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (empty($rows)) {
    $rows = 'Not Found';
  }
} else {
  $sql = 'SELECT MaTheLoai,TenTheLoai FROM category ORDER BY MaTheLoai DESC';
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
            <strong class="card-title mb-0">Danh sách sản phẩm</strong>
          </div>
          <div class="d-flex align-items-center justify-content-between" style="padding: .75rem 1.25rem;">
            <form action="" method="post" class="d-flex align-items-center" style="gap: 8px;">
              <input type="text" class="p-2 px-3" placeholder="Từ khóa tìm kiếm" name="keyword" autocomplete="off" id="keyword" style="border: 1px solid #ccc">
              <input type="submit" name="search" class="btn text-white py-2" value="Tìm kiếm" style="background-color: #38284f;">
            </form>
            <a href="index.php?page=category&query=listed"><i class="fa-solid fa-rotate-right p-2"></i></a>
          </div>
          <div class="table-stats order-table ov-h">
            <table class="table">
              <thead>
                <tr>
                  <th>Mã thể loại</th>
                  <th>Tên thể loại</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($rows === 'Not Found') {
                ?>
                  <tr>
                    <td colspan="4" class="text-center">Không tìm thấy</td>
                  </tr>
                  <?php
                } else {
                  foreach ($rows as $row) {
                    $htmlspecialchars = 'htmlspecialchars';
                  ?>
                    <tr>
                      <td><?php echo $row['MaTheLoai'] ?></td>
                      <td>
                        <span class="name"><?php echo $htmlspecialchars($row['TenTheLoai']) ?></span>
                      </td>

                      <td>
                        <a class="text-dark" href="modules/Manage_Category/handle.php?query=delete&id=<?php echo ($htmlspecialchars($row['MaTheLoai'])) ?>"><i class="fa-solid fa-trash-can fa-lg"></i></a> |
                        <a class="text-dark" href="?page=category&query=edit&id=<?php echo $htmlspecialchars($row['MaTheLoai']) ?>"> <i class="fa-solid fa-pen fa-lg"></i></a>
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