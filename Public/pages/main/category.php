<?php
if (isset($_GET["idcate"])) {
  $idbook = $_GET["idcate"];
} else {
  $idbook = "";
}

$sql = "SELECT * FROM book b JOIN category c ON b.MaTheLoai=c.MaTheLoai WHERE b.MaTheLoai LIKE '%$idbook%'";
$sql2 = "SELECT * FROM category WHERE MaTheLoai LIKE '%$idbook%'";

try {
  $statement = $pdo->prepare($sql);
  $statement2 = $pdo->prepare($sql2);
  $statement->execute();
  $statement2->execute();
  $htmlspecialchars = 'htmlspecialchars';
  $title = $statement2->fetch();
} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
<main class="p-3 px-2">
  <div class="container pt-3 px-0">
    <div class="products row m-0" style="background-color: #FFFFFF;">
      <div class="p-3 mb-3" style="width: 100%;background-color: #38284f;">
        <i class="fa-solid fa-cart-plus fa-xl text-white"></i>
        <span class="text-white text-uppercase"><?php echo $htmlspecialchars($title['TenTheLoai']) ?></span>
      </div>
      <?php while ($row = $statement->fetch()) { ?>
    
        
        <form action="pages/modules/handle-cart.php" method="POST" class="col-lg-3 col-md-4 col-sm-6 mb-3 d-flex justify-content-center" style="overflow: hidden">
          <div class="product-card zoom_image_product_cart shadow-md ">
            <div class="badge ">Hot</div>
            <div class="product-tumb">
              <a class="text-center" href="../index.php?page=detail&idbook=<?php echo $htmlspecialchars($row['MaSach']) ?>">
                <img class="zoom_image_product_cart"  src="../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" 
                alt="" style="max-width: 100%; max-height: 100%; width: 150px; height: 200px; object-fit: cover;">
              </a>
            </div>
            <div class="product-details p-3">
              <!-- <span class="product-catagory"><?php echo $htmlspecialchars($row['TenTheLoai']) ?></span> -->
              <h4 class="pt-2 text-truncate text-break zoom_image_product_cart"><a href="../index.php?page=detail&idbook=<?php echo $htmlspecialchars($row['MaSach']) ?>" class="text-black t"><?php echo $htmlspecialchars($row['TenSach']) ?></a></h4>
              <p class="pt-1 zoom_image_product_cart text-truncate">Tác giả: <?php echo $htmlspecialchars($row['TacGia']) ?></p>
              <div class="product-bottom-details div-product-bottom">
                <div class="row">
                  <div class="col-6 col-md-7 ">
                    <p class="pt-2 text-black " style="font-size: 20px;  "> <?php echo number_format($htmlspecialchars($row['DonGia']), 0, ',', '.') . 'vnđ' ?></p>
                  </div>
                  <div class="col-6 col-md-5">
                    <button type="submit" class="btn text-white icon-hover-danger w-100 " 
                    value="add" name="add-cart" style="width: 100%; background-color: #38284f;  border-radius: 0"><i class="fa-solid fa-cart-plus fa-lg"></i>
                    </button>
                   
                  </div>
                  
                </div>
              </div>
            </div> 
          </div>

          <input type="hidden" value="<?php echo $htmlspecialchars($row['TacGia']) ?>" name="TacGia">
          <input type="hidden" value="<?php echo $htmlspecialchars($row['NhaXB']) ?>" name="NXB">
          <input type="hidden" value="<?php echo $htmlspecialchars($row['MaSach']) ?>" name="MaSach">
          <input type="hidden" value="<?php echo $htmlspecialchars($row['MaTheLoai']) ?>" name="MaTheLoai">
          <input type="hidden" value="<?php echo $htmlspecialchars($row['HinhAnh']) ?>" name="img-book">
          <input type="hidden" value="<?php echo $htmlspecialchars($row['TenSach']) ?>" name="name-book">
          <input type="hidden" value="<?php echo $htmlspecialchars($row['DonGia']) ?>" name="price-book">
        </form>
      <?php } ?>
    </div>
  </div>
</main>