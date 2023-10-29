<?php
require_once __DIR__ . "/../../config/config.php";
$sql = "SELECT * FROM category";

$statement = $pdo->prepare($sql);
$statement->execute();
?>
<main>
  <div class="container" style="width: 30%">
    <form action="modules/Manage_Books/handle.php" method="POST">
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
          Mã tác giả:</label>
        <input type="text" class="form-control" id="id-author" name="id-author" />
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
            <option><?php echo $htmlspecialchars($row['TenTheLoai']) ?></option>
          <?php } ?>
        </select>

      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="id-book" class="form-label text-end pe-3" style="width: 30%">
          Hình ảnh:</label>
        <input type="file" class="form-control" id="id-book" name="id-book" />
      </div>
      <div class="text-center">
        <input type="submit" class="btn btn-primary" name="add-book" value="Thêm" />
      </div>
    </form>
  </div>
</main>