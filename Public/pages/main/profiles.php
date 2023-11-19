<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["avatar"])) {
  $user_id = $_SESSION['login']['username'];
  $file_tmp = $_FILES["avatar"]["tmp_name"];
  $file_name = $_FILES["avatar"]["name"];
  $file_name =  time() . '_' . $file_name;
  $file_size = $_FILES["avatar"]["size"];
  $file_type = $_FILES["avatar"]["type"];
  // Đường dẫn để lưu trữ ảnh
  $upload_path = "img/avatar_user/";
  $target_file = $upload_path . basename($file_name);
  $name_file = basename($file_name);
  // Kiểm tra định dạng ảnh (có thể thêm kiểm tra đối với các định dạng khác)
  $allowed_types = array("image/jpeg", "image/png", "image/gif");
  if (in_array($file_type, $allowed_types)) {
    // Di chuyển file tạm thời đến địa chỉ đích
    move_uploaded_file($file_tmp, $target_file);
    // Cập nhật đường dẫn ảnh mới vào cơ sở dữ liệu
    $statement = $pdo->prepare("SELECT * FROM tbl_user WHERE TenDangNhap LIKE '%$user_id%'");
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if ($row['Hinh'] != 'avatar.png') {
      unlink('img/avatar_user/' . $row["Hinh"]);
    }
    $update_sql = "UPDATE tbl_user SET Hinh = '$name_file' WHERE TenDangNhap LIKE '%$user_id%'";
    $statement = $pdo->prepare($update_sql);
    $statement->execute();
    $_SESSION['login']['img'] = $name_file;
    // if ($pdo->query($update_sql) === TRUE) {
    // } else {
    // echo "Error updating avatar: " . $conn->error;
    // }
  } else {
    echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
  }
}
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
                <?php if ($htmlspecialchars($row['Hinh']) == 'avatar.png') { ?>
                  <img src="../../img/<?php echo  $htmlspecialchars($row['Hinh']) ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <?php } else { ?>
                  <img src="../../img/avatar_user/<?php echo  $htmlspecialchars($row['Hinh']) ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <?php } ?>
                <input type="file" id="avatar" placeholder="rỗng" accept="image/*" onchange="uploadAvatar()">
                <script>
                  function uploadAvatar() {
                    var input = document.getElementById('avatar');
                    var file = input.files[0];
                    // Tạo đối tượng FormData để gửi dữ liệu hình ảnh
                    var formData = new FormData();
                    formData.append('avatar', file);
                    // Sử dụng Ajax để gửi dữ liệu
                    $.ajax({
                      url: 'http://ct275_project.localhost/index.php?page=profile',
                      type: 'POST',
                      data: formData,
                      processData: false,
                      contentType: false,
                      success: function(response) {
                        Swal.fire({
                          icon: 'success',
                          title: 'Thành công ',
                          text: 'Cập nhật ảnh đại diện thành công',
                        }).then(function() {
                          window.location.href = 'index.php?page=profile'
                        });
                      }
                    });
                  }
                </script>
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