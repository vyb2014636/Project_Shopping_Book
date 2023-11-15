<?php
require_once __DIR__ . "/../../config/config.php";

$id_edit = $_GET["id"];
$sql = "SELECT * FROM category WHERE MaTheLoai LIKE '%$id_edit%' LIMIT 1";
try {
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $row = $statement->fetch();
  $htmlspecialchars = 'htmlspecialchars';
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>
<main>
  <div class="card-header d-flex align-items-center justify-content-center py-2" style="font-size: x-large;">
    <strong class="card-title mb-0">Sửa thể loại</strong>
  </div>
  <div class="container py-3" style="width: 30%">
    <form action="modules/Manage_Category/handle.php?page=category&query=edit&id=<?php echo $htmlspecialchars($row['MaTheLoai']) ?>" method="POST">
      <div class="mb-3 d-flex">
        <label for="id-cate" class="form-label" style="width: 40%">
          Mã danh mục:</label>
        <input type="text" class="form-control" id="id-cate" name="id-cate" value="<?php echo $htmlspecialchars($row['MaTheLoai']) ?>" />
      </div>
      <div class="mb-3 d-flex">
        <label for="name-cate" class="form-label" style="width: 40%">Tên danh mục:</label>
        <input type="text" class="form-control" id="name-cate" name="name-cate" value="<?php echo $htmlspecialchars($row['TenTheLoai']) ?>" />
      </div>
      <div class="text-center">
        <input type="submit" class="btn btn-primary" name="edit-cate" value="Sửa" />
      </div>
    </form>
  </div>
</main>