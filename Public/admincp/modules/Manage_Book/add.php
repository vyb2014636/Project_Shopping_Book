<?php
require_once __DIR__ . "/../../config/config.php";
$sql = "SELECT * FROM category";

$statement = $pdo->prepare($sql);
$statement->execute();
?>
<main>
  <div class="card-header d-flex align-items-center justify-content-center py-2" style="font-size: x-large;">
    <strong class="card-title mb-0">Thêm sản phẩm</strong>
  </div>
  <div class="container py-4" style="width: 40%">
    <form action="modules/Manage_Book/handle.php" enctype="multipart/form-data" method="POST">
      <div class="mb-3 d-flex align-items-center">
        <label for="id-book" class="form-label text-end pe-3" style="width: 30%">
          Mã sách:</label>
        <input type="text" class="form-control" id="id-book" name="id-book" />
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="name-book" class="form-label text-end pe-3" style="width: 30%">Tên sách:</label>
        <input type="text" class="form-control" id="name-book" name="name-book" />
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="id-author" class="form-label text-end pe-3" style="width: 30%">
          Tên tác giả:</label>
        <input type="text" class="form-control" id="id-author" name="id-author" />
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="NXB-book" class="form-label text-end pe-3" style="width: 30%">
          Nhà XB:</label>
        <input type="text" class="form-control" id="NXB-book" name="NXB-book" />
      </div>

      <div class="mb-3 d-flex align-items-center">
        <label for="price-book" class="form-label text-end pe-3" style="width: 30%">
          Đơn giá:</label>
        <input type="text" class="form-control" id="price-book" name="price-book" />
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="id-cate" class="form-label text-end pe-3" style="width: 30%">
          Thể loại:</label>
        <select class="form-select" name="id-cate" id="id-cate">
          <option selected>Open this select menu</option>
          <?php while ($row = $statement->fetch()) {
            $htmlspecialchars = 'htmlspecialchars';
          ?>
            <option value="<?php echo $htmlspecialchars($row['MaTheLoai']) ?>"><?php echo $htmlspecialchars($row['TenTheLoai']) ?></option>
          <?php } ?>
        </select>

      </div>

      <div class="mb-3 d-flex align-items-center">
        <label for="img-book" class="form-label text-end pe-3" style="width: 30%">
          Hình ảnh 1:</label>
        <input type="file" class="form-control" id="img-book" name="img-book" />
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="img-book" class="form-label text-end pe-3" style="width: 30%">
          Hình ảnh 2:</label>
        <input type="file" class="form-control" id="img-book2" name="img-book2" />
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="img-book" class="form-label text-end pe-3" style="width: 30%">
          Hình ảnh 3:</label>
        <input type="file" class="form-control" id="img-book3" name="img-book3" />
      </div>
      <div class="text-center">
        <input type="submit" class="btn" name="add-book" value="Thêm" style="background-color: #38284f;color: white;" />
        <a href="?page=books&query=listed" class="btn " style="background-color: #38284f;color: white;">Xem danh sách</a>
      </div>
    </form>
  </div>
</main>