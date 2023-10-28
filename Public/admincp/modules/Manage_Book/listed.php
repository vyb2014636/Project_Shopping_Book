<?php
include_once __DIR__ . '/../partials/db_connect.php';

$sql = 'SELECT IdDanhMuc,TenDanhMuc FROM category ORDER BY IdDanhMuc DESC';
try {
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $row = $statement->fetch();
?>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Mã danh mục</th>
          <th scope="col">Tên danh mục</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row) {
          $htmlspecialchars = 'htmlspecialchars';
        ?>
          <tr>
            <td><?php echo $htmlspecialchars($row['IdDanhMuc']) ?></td>
            <td><?php echo $htmlspecialchars($row['TenDanhMuc']) ?></td>
          </tr>
          <?php
        }
      } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
          ?>>
      </tbody>
    </table>
  </div>