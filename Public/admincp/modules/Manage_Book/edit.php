<?php
require_once __DIR__ . "/../../config/config.php";

$id_edit = $_GET["id"];
$sql = "SELECT * FROM book WHERE MaSach LIKE '%$id_edit%' LIMIT 1";
$sqlc = "SELECT * FROM category";

try {
  $statement = $pdo->prepare($sql);
  $statementc = $pdo->prepare($sqlc);

  $statement->execute();
  $statementc->execute();

  $row = $statement->fetch();
  $htmlspecialchars = 'htmlspecialchars';
} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
<main>
  <div class="container" style="width: 30%">
    <form action="modules/Manage_Book/handle.php?page=books&query=edit&id=<?php echo $htmlspecialchars($row["MaSach"]) ?>" enctype="multipart/form-data" method="POST">
      <div class="mb-3 d-flex align-items-center">
        <label for="id-book" class="form-label text-end pe-3" style="width: 30%">
          Mã sách:</label>
        <input type="text" class="form-control" id="id-book" name="id-book" value="<?php echo $htmlspecialchars($row["MaSach"]) ?>" />
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="name-book" class="form-label text-end pe-3" style="width: 30%">Tên sách:</label>
        <input type="text" class="form-control" id="name-book" name="name-book" value="<?php echo $htmlspecialchars($row["TenSach"]) ?>" />
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="id-author" class="form-label text-end pe-3" style="width: 30%">
          Tên tác giả:</label>
        <input type="text" class="form-control" id="id-author" name="id-author" value="<?php echo $htmlspecialchars($row["TacGia"]) ?>" />
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="NXB-book" class="form-label text-end pe-3" style="width: 30%">
          Nhà XB:</label>
        <input type="text" class="form-control" id="NXB-book" name="NXB-book" value="<?php echo $htmlspecialchars($row["NhaXB"]) ?>" />
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="content-book" class="form-label text-end pe-3" style="width: 30%">
          Nội dung:</label>
        <textarea name="content-book" id="content-book" cols="50" rows="4"><?php echo $htmlspecialchars($row["NoiDung"]) ?></textarea>
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="price-book" class="form-label text-end pe-3" style="width: 30%">
          Đơn giá:</label>
        <input type="text" class="form-control" id="price-book" name="price-book" value="<?php echo $htmlspecialchars($row["DonGia"]) ?>" />
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="id-cate" class="form-label text-end pe-3" style="width: 30%">
          Thể loại:</label>
        <select class="form-select" name="id-cate" id="id-cate">
          <?php

          while ($rowc = $statementc->fetch()) {
            if ($htmlspecialchars($row["MaTheLoai"] == $rowc["MaTheLoai"])) {
          ?>
              <option value="<?php echo $htmlspecialchars($rowc['MaTheLoai']) ?>" selected><?php echo $htmlspecialchars($rowc['TenTheLoai']) ?></option>
            <?php } else { ?>
              <option value="<?php echo $htmlspecialchars($rowc['MaTheLoai']) ?>"><?php echo $htmlspecialchars($rowc['TenTheLoai']) ?></option>
          <?php
            }
          } ?>
        </select>
      </div>
      <div class="mb-3 d-flex align-items-center">
        <label for="img-book" class="form-label text-end pe-3" style="width: 30%">
          Hình ảnh:</label>
        <input type="file" class="form-control" id="img-book" name="img-book" value="<?php echo $htmlspecialchars($row["HinhAnh"]) ?>" />
      </div>
      <div class="text-center">
        <input type="submit" class="btn btn-primary" name="edit-book" value="Sửa" />
        <a href="?page=books&query=listed" class="btn btn-primary">Xem danh sách</a>
      </div>
    </form>
  </div>

</main>