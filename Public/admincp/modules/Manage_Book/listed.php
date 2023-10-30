<?php

$sql = 'SELECT * FROM book ORDER BY MaTheLoai DESC';
try {
  $statement = $pdo->prepare($sql);
  $statement->execute();
?>
  <div class="container mt-3 d-flex justify-content-between">
    <div>
      <h5>Danh sách sản phẩm</h5>
    </div>
    <div class="text-center">
      <a href="?page=books&query=add" class="btn btn-primary">Thêm</a>
    </div>
  </div>
  <div class="container mt-3">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">hình ảnh</th>
          <th scope="col">Mã sách</th>
          <th scope="col">Tên sách</th>
          <th scope="col">Tên tác giả</th>
          <th scope="col">Đơn giá</th>
          <th scope="col">Tên thể loại</th>

          <th class="text-center" scope="col">Xóa|Sửa</th>

        </tr>
      </thead>
      <tbody>
        <?php


        while ($row = $statement->fetch()) {
          $htmlspecialchars = 'htmlspecialchars';
        ?>
          <tr>
            <td><img style="width: 70px;height: 70px;" src="modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" alt=""></td>
            <td><?php echo $htmlspecialchars($row['MaSach']) ?></td>

            <td><?php echo $htmlspecialchars($row['TenSach']) ?></td>
            <td><?php echo $htmlspecialchars($row['TacGia']) ?></td>

            <td><?php echo $htmlspecialchars($row['DonGia']) ?></td>
            <td><?php echo $htmlspecialchars($row['MaTheLoai']) ?></td>

            <td class="text-center">
              <a class="text-dark" href="modules/Manage_Book/handle.php?query=delete&id=<?php echo $htmlspecialchars($row['MaSach']) ?>"><i class="fa-solid fa-trash-can fa-lg"></i></a> |
              <a class="text-dark" href="?page=books&query=edit&id=<?php echo $htmlspecialchars($row['MaSach']) ?>"> <i class="fa-solid fa-pen fa-lg"></i></a>
            </td>
          </tr>
        <?php
        }
        if ($quantityRow = $statement->rowCount() == 0) {
        ?>
          <tr ">
            <td colspan=" 3" style="text-align: center;">
            <div style="font-size: 30px;">Danh mục rỗng</div>
            </td>
          </tr>
      <?php
        }
      } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
      ?>
      </tbody>
    </table>
  </div>