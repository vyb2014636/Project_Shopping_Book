<main class="bg-light pt-4 rounded">
  <div class="container pt-3 px-0">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">hình ảnh</th>
          <th scope="col">Tên sách</th>
          <th scope="col">Đơn giá</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Thành tiền</th>
          <th class="text-center" scope="col">Xóa|Sửa</th>
        </tr>
      </thead>
      <tbody><?php
              if (isset($_SESSION["cart"]) && (count($_SESSION["cart"]) > 0)) {
                foreach ($_SESSION['cart'] as $item) {
              ?>
            <tr>

              <td><img style="width: 70px;height: 70px;" src="../../admincp/modules/Manage_Book/uploads/<?php echo $item[2] ?>" alt=""></td>
              <td><?php echo $item[1] ?></td>
              <td><?php echo number_format($item[3], 0, ',', '.') . ' vnđ' ?></td>
              <td><?php echo $item[4] ?></td>
              <td><?php echo number_format($item[3] * $item[4], 0, ',', '.') . ' vnđ' ?></td>
              <td class="text-center">
                <a class="text-dark" href="../../pages/modules/handle-cart.php?want=delcartid&id=<?php echo $item[0] ?>">
                  <i class=" fa-solid fa-trash-can fa-lg"></i>
                </a>
              </td>
            </tr>

          <?php }
              } else {
          ?>
          <tr>
            <td colspan="6" style="text-align: center;">
              <h1>Giỏ hàng rỗng</h1>
            </td>
          </tr>
        <?php
              } ?>
      </tbody>
    </table>
  </div>
</main>