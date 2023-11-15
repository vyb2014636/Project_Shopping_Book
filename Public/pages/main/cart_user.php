<main class="bg-light pt-4 rounded">
  <div class="container pt-3 px-0">
    <div class="table-responsive row">
      <div class="col-md-9">
        <table class="table">
          <thead class="rounded">
            <tr>
              <th scope="col" class="border-0 text-white rounded-start" style="background-color: #38284f;">
                <div class="py-2 text-uppercase">Tên sách</div>
              </th>
              <th scope="col" class="border-0 text-white" style="background-color: #38284f;">
                <div class="py-2 text-uppercase">Đơn giá</div>
              </th>
              <th scope="col" class="border-0 text-white" style="background-color: #38284f;">
                <div class="py-2 text-uppercase">Số lượng</div>
              </th>
              <th scope="col" class="border-0 text-white" style="background-color: #38284f;">
                <div class="py-2 text-uppercase">Thành tiền</div>
              </th>
              <th scope="col" class="border-0 text-white rounded-end" style="background-color: #38284f;">
                <div class="py-2 text-uppercase">Xóa</div>
              </th>
            </tr>
          </thead>
          <tbody> <?php
                  $sum = 0;
                  if (isset($_SESSION["login"])) {
                    $id_user = $_SESSION['login']['username'];
                    $statement = $pdo->prepare("SELECT * FROM cart WHERE TenTaiKhoan LIKE '%$id_user%' AND MaDonHang=0");
                    $statement->execute();
                    $row_count = $statement->rowCount();
                    $htmlspecialchars = 'htmlspecialchars';
                    if ($row_count > 0) {
                      while ($row = $statement->fetch()) {
                        $sum += $htmlspecialchars($row['DonGia']) * $htmlspecialchars($row['SoLuong']);
                  ?>
                  <tr>
                    <th scope="row" class="border-0">
                      <div class="p-2">
                        <img src="../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle d-sm-none d-md-block">
                              <?php echo $htmlspecialchars($row['TenSach']);
                              $idcate = $htmlspecialchars($row['MaTheLoai']); ?></a></h5><span class="text-muted font-weight-normal font-italic d-block d-sm-none d-md-block">Thể loại:
                            <?php
                            $sql = "SELECT TenTheLoai FROM category where MaTheLoai LIKE '%$idcate%' LIMIT 1 ";
                            $statements = $pdo->prepare($sql);
                            $statements->execute();
                            $rows = $statements->fetch();
                            echo $htmlspecialchars($rows['TenTheLoai']) ?></span>
                        </div>
                      </div>
                    </th>

                    <td class="border-0 align-middle"><strong><?php echo number_format($htmlspecialchars($row['DonGia']), 0, ',', '.') . ' vnđ' ?></strong></td>
                    <td class="border-0 align-middle ps-3"><a href="../../pages/modules/handle-cart.php?act=minus&idbook=<?php echo $htmlspecialchars($row['MaSach']) ?>"><i class="fa-solid fa-minus fa-lg text-dark"></i></a><strong class='px-3'><?php echo  $htmlspecialchars($row['SoLuong']) ?></strong><a href="../../pages/modules/handle-cart.php?act=plus&idbook=<?php echo $htmlspecialchars($row['MaSach']) ?>"><i class="fa-solid fa-plus fa-lg text-dark"></i></a></td>
                    <td class="border-0 align-middle"><strong><?php echo number_format($htmlspecialchars($htmlspecialchars($row['DonGia']) * $htmlspecialchars($row['SoLuong'])), 0, ',', '.') . ' vnđ' ?></strong></td>
                    <td class="border-0 align-middle"><a href="../../pages/modules/handle-cart.php?want=delcartid&id=<?php echo $htmlspecialchars($row['MaSach']) ?>&stay=1" class=" text-dark"><i class="fa fa-trash"></i></a></td>
                  </tr>
                <?php }
                    } else {
                ?>
                <tr>
                  <th scope="row" class="border-0">Giỏ hàng rỗng</th>

                </tr>
            <?php }
                  } ?>
          </tbody>
        </table>
      </div>
      <div class='col-md-3'>
        <div class="rounded px-4 py-3 text-uppercase font-weight-bold text-white" style="background-color: #38284f;">Đơn hàng</div>
        <div class="p-4">
          <ul class="list-unstyled mb-4">
            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tổng tiền </strong><strong>
                <?php
                if ($sum > 0) {
                  echo number_format($sum, 0, ',', '.') . ' vnđ';
                } else echo '0 vnđ'; ?></strong></li>

            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Thuế</strong><strong>0 vnđ</strong></li>
            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tổng cộng</strong>
              <h5 class="font-weight-bold"><?php echo number_format($sum, 0, ',', '.') . ' vnđ'  ?></h5>
            </li>
          </ul><a href="../../index.php?page=payments" class="btn btn-dark rounded-pill py-2 btn-block">Đặt hàng</a>
        </div>
      </div>
    </div>
  </div>
</main>