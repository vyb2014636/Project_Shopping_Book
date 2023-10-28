<?php

$sql = 'SELECT IdDanhMuc,TenTheLoai FROM category ORDER BY IdDanhMuc DESC';
try {
  $statement = $pdo->prepare($sql);
  $statement->execute();
?>
  <div class="container mt-3">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Mã danh mục</th>
          <th scope="col">Tên danh mục</th>
          <th class="text-center" scope="col">Xóa|Sửa</th>

        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $statement->fetch()) {
          $htmlspecialchars = 'htmlspecialchars';
        ?>
          <tr>
            <td><?php echo $htmlspecialchars($row['IdDanhMuc']) ?></td>
            <td><?php echo $htmlspecialchars($row['TenTheLoai']) ?></td>
            <td class="text-center">
              <a class="text-dark" href="modules/Manage_Category/handle.php?query=delete&id=<?php echo $htmlspecialchars($row['IdDanhMuc']) ?>"><i class="fa-solid fa-trash-can fa-lg"></i></a> |
              <a class="text-dark" href="modules/Manage_Category/handle.php?query=edit&id=<?php echo $htmlspecialchars($row['IdDanhMuc']) ?>"> <i class="fa-solid fa-pen fa-lg"></i></a>
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