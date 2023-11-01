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
        <form action="main/cart.php" method="POST" class="d-flex justify-content-center col-md-2 py-2 product" style="height: 400px;">
          <div class="border d-flex flex-column" style="width: 100%;box-shadow: 2px 3px silver;">
            <a class="card-img-top p-2 img-product" href="../index.php?page=detail&idbook=<?php echo $htmlspecialchars($row['MaSach']) ?>" style="height: 40%; margin-bottom: auto; flex-shrink:0;cursor: pointer; overflow: hidden;">
              <img src=" ../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" style="width: 100%;height: 100%; object-fit: contain;" />
            </a>
            <div class="card-body px-3 py-2 body-product d-flex flex-column ">
              <div class="card-name">
                <h2 class="card-title text-truncate text-wrap name-book fw-bold justify-content-start">
                  <a href="" style="font-size: 0.48em;color:black"><?php echo $htmlspecialchars($row['TenSach']) ?></a>
                </h2>
              </div>
              <div class="card-text py-2   mt-auto card-price">
                Giá:&nbsp;<span class="price-product d-inline"> <?php echo number_format($htmlspecialchars($row['DonGia']), 0, ',', '.') . 'vnđ' ?></span>
              </div>
              <div class="mb-3"><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bx-star"></i></div>
            </div>
            <div class="star p-3 pt-0 d-flex flex-column" style="flex-shrink:0 ;">
              <a href="#" class="add-to-cart btn btn-primary" style="width:90%" name="add-cart">Thêm vào giỏ</a>
            </div>
          </div>
        </form>
      <?php } ?>
    </div>
  </div>
</main>