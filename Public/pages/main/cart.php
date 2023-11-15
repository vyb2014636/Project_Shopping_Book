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
                  if (isset($_SESSION["cart"]) && (count($_SESSION["cart"]) > 0)) {
                    foreach ($_SESSION['cart'] as $item) {
                      $sum += $item[3] * $item[4];

                  ?>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="../../admincp/modules/Manage_Book/uploads/<?php echo $item[2] ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo $item[1] ?></a></h5><span class="text-muted font-weight-normal font-italic d-block">Thể loại:
                          <?php
                          $htmlspecialchars = 'htmlspecialchars';
                          $sql = "SELECT TenTheLoai FROM category where MaTheLoai LIKE '%$item[5]%' LIMIT 1 ";
                          $statements = $pdo->prepare($sql);
                          $statements->execute();
                          $row = $statements->fetch();
                          echo $htmlspecialchars($row['TenTheLoai']) ?></span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong><?php echo number_format($item[3], 0, ',', '.') . ' vnđ' ?></strong></td>
                  <td class="border-0 align-middle"><strong><?php echo $item[4] ?></strong></td>
                  <td class="border-0 align-middle"><strong><?php echo number_format($item[3] * $item[4], 0, ',', '.') . ' vnđ' ?></strong></td>
                  <td class="border-0 align-middle"><a href="../../pages/modules/handle-cart.php?want=delcartid&id=<?php echo $item[0]  ?>&stay=1" class=" text-dark"><i class="fa fa-trash"></i></a></td>
                </tr>
              <?php }
                  } else {
              ?>
              <tr>
                <th scope="row" class="border-0">Giỏ hàng rỗng</th>

              </tr>
            <?php } ?>
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
          </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Đặt hàng</a>
        </div>
      </div>
    </div>
  </div>
</main>