<?php

$sql = 'SELECT * FROM book ORDER BY MaSach ASC';
try {
  $statement = $pdo->prepare($sql);
  $statement->execute();
?>




  <div class="content" style="min-height: 100vh;">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
              <strong class="card-title mb-0">Danh sách sản phẩm</strong>
            </div>
            <!-- <div class="d-flex align-items-center justify-content-between" style="padding: .75rem 1.25rem;">
              <form action="" method="post" class="d-flex align-items-center" style="gap: 8px;">
                <input type="text" class="p-2 px-3" placeholder="Từ khóa tìm kiếm" name="keyword" autocomplete="off" id="keyword" style="border: 1px solid #ccc">
                <input type="submit" name="search" class="btn text-white py-2" value="Tìm kiếm" style="background-color: #28a745;">
              </form>
              <a href="/index.php?page=products&act=list"><i class="fa-solid fa-rotate-right p-2"></i></a>
            </div> -->
            <div class="table-stats order-table ov-h">
              <table class="table">
                <thead>
                  <tr>
                    <th>hình ảnh</th>
                    <th>Mã sách</th>
                    <th>Tên sách</th>
                    <th>Tên tác giả</th>
                    <th>Nhà xuất bản</th>
                    <th>Đơn giá</th>
                    <th>Tên thể loại</th>
                    <th class="text-center">Xóa|Sửa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = $statement->fetch()) {
                    $htmlspecialchars = 'htmlspecialchars';
                  ?>
                    <tr>
                      <td><img style="height: 70px; object-fit: cover;" src="modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" alt=""></td>
                      <td><?php echo $htmlspecialchars($row['MaSach']) ?></td>

                      <td><?php echo $htmlspecialchars($row['TenSach']) ?></td>

                      <td><?php echo $htmlspecialchars($row['TacGia']) ?></td>
                      <td><?php echo $htmlspecialchars($row['NhaXB']) ?></td>


                      <td><?php echo $htmlspecialchars($row['DonGia']) ?></td>
                      <td style="width: 10%;"><a href="?page=category&query=listed" class="text-dark"><?php echo $htmlspecialchars($row['MaTheLoai']) ?></a></td>

                      <td class="text-center">
                        <a class="text-dark" href="modules/Manage_Book/handle.php?query=delete&id=<?php echo $htmlspecialchars($row['MaSach']) ?>"><i class="fa-solid fa-trash-can fa-lg"></i></a> |
                        <a class="text-dark" href="?page=books&query=edit&id=<?php echo $htmlspecialchars($row['MaSach']) ?>"> <i class="fa-solid fa-pen fa-lg"></i></a>
                      </td>
                    </tr>
                <?php
                  }
                } catch (PDOException $e) {
                  echo '' . $e->getMessage() . '';
                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>