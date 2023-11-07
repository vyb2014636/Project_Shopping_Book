<main class="pt-3 px-2">
  <div class="container pt-3 px-0">
    <div class="products row m-0" style="background-color: #FFFFFF;">
      <div class="p-3 mb-2" style="width: 100%;background-color: #38284f;">
        <i class="fa-solid fa-cart-plus fa-xl text-white"></i>
        <span class="text-white">Danh sách tìm kiếm</span>
      </div>
      <?php while ($row = $statement->fetch()) { ?>
        <form action="pages/modules/handle-cart.php" method="POST" class="d-flex justify-content-center col-md-2 py-2 product" style="height: 400px">
          <div class="border d-flex flex-column" style="width: 100%;box-shadow: 2px 3px silver;">
            <a class="card-img-top p-2 img-product" href="../index.php?page=detail&idbook=<?php echo $htmlspecialchars($row['MaSach']) ?>" style="height: 40%; margin-bottom: auto; flex-shrink:0;cursor: pointer; overflow: hidden;">
              <img src=" ../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" style="width: 100%;height: 100%; object-fit: contain;" />
            </a>
            <div class="card-body px-3 py-2 body-product d-flex flex-column ">
              <div class="card-name">
                <h2 class="card-title text-truncate text-wrap name-book fw-bold justify-content-start">
                  <a href="#" style="font-size: 0.48em;color:black"><?php echo $htmlspecialchars($row['TenSach']) ?></a>
                </h2>

              </div>
              <div class="card-text py-2   mt-auto card-price">
                Giá:&nbsp;<span class="price-product d-inline" name="price-book"> <?php echo number_format($htmlspecialchars($row['DonGia']), 0, ',', '.') . 'vnđ' ?></span>
              </div>
              <div class="mb-3"><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bx-star"></i></div>

            </div>
            <div class="star p-3 pt-0 d-flex flex-column" style="flex-shrink:0 ;">
              <input type="submit" class="add-to-cart btn btn-primary" style="width:90%" value="Thêm vào giỏ" name="add-cart">
            </div>

            <input type="hidden" value="<?php echo $htmlspecialchars($row['NoiDung']) ?>" name="NoiDung">
            <input type="hidden" value="<?php echo $htmlspecialchars($row['TacGia']) ?>" name="TacGia">
            <input type="hidden" value="<?php echo $htmlspecialchars($row['NhaXB']) ?>" name="NXB">
            <input type="hidden" value="<?php echo $htmlspecialchars($row['MaSach']) ?>" name="MaSach">
            <input type="hidden" value="<?php echo $htmlspecialchars($row['MaTheLoai']) ?>" name="MaTheLoai">
            <input type="hidden" value="<?php echo $htmlspecialchars($row['HinhAnh']) ?>" name="img-book">
            <input type="hidden" value="<?php echo $htmlspecialchars($row['TenSach']) ?>" name="name-book">
            <input type="hidden" value="<?php echo $htmlspecialchars($row['DonGia']) ?>" name="price-book">
          </div>
        </form>
      <?php } ?>
    </div>
  </div>
</main>