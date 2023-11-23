<main class="px-2">
  <div class="container pt-3 px-0">
    <div class="products row m-0 " style="background-color: #FFFFFF;">
      <div class="p-3 mb-2" style="width: 100%;background-color: #38284f;">
        <i class="fa-solid fa-magnifying-glass fa-xl text-white"></i>
        <span class="text-white">Sản phẩm tìm kiếm : <?php echo $stext ?> </span>
      </div>
      <?php while ($row = $statement->fetch()) { ?>


        <form action="pages/modules/handle-cart.php" method="POST" class="col-lg-3 col-md-4 col-sm-6 mb-3 d-flex justify-content-center" style="overflow: hidden">
          <div class="product-card zoom_image_product_cart shadow-md d-flex flex-column">
            <div class="badge ">Hot</div>
            <div class="product-tumb">
              <a class="text-center" href="../index.php?page=detail&idbook=<?php echo $htmlspecialchars($row['MaSach']) ?>">
                <img class="zoom_image_product_cart" src="../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" alt="" style="max-width: 100%; max-height: 100%; width: 150px; height: 200px; object-fit: cover;">
              </a>
            </div>
            <div class="product-details p-3 d-flex flex-column" style="flex: 1;">
              <!-- <span class="product-catagory"><?php echo $htmlspecialchars($row['TenTheLoai']) ?></span> -->
              <h4 class="pt-2 text-truncate text-break zoom_image_product_cart"><a href="../index.php?page=detail&idbook=<?php echo $htmlspecialchars($row['MaSach']) ?>" class="text-black t"><?php echo $htmlspecialchars($row['TenSach']) ?></a></h4>
              <p class="pt-1 zoom_image_product_cart text-truncate">Tác giả: <?php echo $htmlspecialchars($row['TacGia']) ?></p>
              <div class="product-bottom-details div-product-bottom d-flex flex-column justify-content-end" style="flex: 1;">
                <div class="row">
                  <?php if ($htmlspecialchars($row['MaTheLoai']) === "EDU") { ?>
                    <p class="special-price"><span class="price m-price-font fhs_center_left " id="discount-book" style="text-decoration: line-through;"> <?php echo number_format($htmlspecialchars($row['DonGia']), 0, ',', '.') . 'vnđ' ?></span>&nbsp;&nbsp;<span style="background-color: #38284f;border-radius: 5px; padding: 0px 5px;color: white;">15%</span></p>
                    <div class="col-6 col-md-7 ">
                      <p class="pt-2 text-black " style="font-size: 20px;  "> <?php echo number_format($htmlspecialchars($row['DonGia'] - $row['DonGia'] * 0.15), 0, ',', '.') . 'vnđ' ?></p>
                    </div>
                  <?php } else { ?>
                    <div class="col-6 col-md-7 ">
                      <p class="pt-2 text-black " style="font-size: 20px;  "> <?php echo number_format($htmlspecialchars($row['DonGia']), 0, ',', '.') . 'vnđ' ?></p>
                    </div>
                  <?php } ?>
                  <div class="col-6 col-md-5">
                    <button type="submit" class="btn text-white icon-hover-danger w-100 " value="add" name="add-cart" style="width: 100%; background-color: #38284f;  border-radius: 0"><i class="fa-solid fa-cart-plus fa-lg"></i>
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
          <?php if ($htmlspecialchars($row['MaTheLoai']) === "EDU") { ?>
            <input type="hidden" value="<?php echo $htmlspecialchars($row['DonGia'] - $row['DonGia'] * 0.15) ?>" name="price-book">
          <?php } else { ?>
            <input type="hidden" value="<?php echo $htmlspecialchars($row['DonGia']) ?>" name="price-book">
          <?php } ?>
        </form>
      <?php } ?>
    </div>
  </div>
</main>