<?php
if (isset($_GET["idcate"])) {
  $idbook = $_GET["idcate"];
} else {
  $idbook = "";
}

$sql = "SELECT * FROM book WHERE MaTheLoai LIKE '%$idbook%'";
try {
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $htmlspecialchars = 'htmlspecialchars';
} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
<main class="pt-3 px-2">
  <div class="container pt-3 px-0">
    <div class="products row m-0">
      <?php while ($row = $statement->fetch()) { ?>
        <div class="d-flex justify-content-center col-md-2 py-2 product">
          <div class="border d-flex flex-column" style="flex:1;">
            <img src="../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" class="card-img-top p-2 img-product" alt="product" />
            <div class="card-body p-3 body-product d-flex flex-column " style="flex-grow:1;">
              <div style="flex-grow:1;">
                <h2 class="card-title text-truncate text-wrap name-book fw-bold justify-content-start">
                  <a href="" style="font-size: 0.48em;color:black"><?php echo $htmlspecialchars($row['TenSach']) ?></a>
                </h2>
              </div>
              <div class="card-text py-2 d-flex flex-column mt-auto">
                <span>Giá: <span class="price-product"><?php echo $htmlspecialchars($row['DonGia']) ?></span> vnđ</span>
              </div>
            </div>
            <div class="star p-2 pt-0 d-flex flex-column" style="flex-shrink:0 ;">
              <div class="mb-3"><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bx-star"></i></div>
              <a href="#" class="add-to-cart btn btn-primary" style="width:90%">Thêm vào giỏ</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</main>