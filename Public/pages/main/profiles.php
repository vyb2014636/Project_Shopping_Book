<?php
if (isset($_SESSION["login"])) {
  $id_user = $_SESSION['login']['username'];
  $statement = $pdo->prepare("SELECT * FROM tbl_user WHERE TenDangNhap LIKE '%$id_user%'");
  $statement->execute();
  // $row_count = $statement->rowCount();
  $htmlspecialchars = 'htmlspecialchars';
  while ($row = $statement->fetch()) {
?>
    <main>

      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img src="../../img/avatar.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"> <?php echo  $htmlspecialchars($row['TenNguoiDung']) ?> </h5>
                <p class="text-muted mb-1">Full Stack Developer</p>
                <p class="text-muted mb-4">Việt Nam</p>

              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"> <?php echo  $htmlspecialchars($row['TenNguoiDung']) ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"> <?php echo  $htmlspecialchars($row['Email']) ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"> <?php echo  $htmlspecialchars($row['SoDienThoai']) ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Mobile</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo  $htmlspecialchars($row['SoDienThoai']) ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo  $htmlspecialchars($row['DiaChi']) ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
<?php }
} ?>