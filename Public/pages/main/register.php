<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['dangky']) && $_POST['dangky']) {
    if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
      $fullname = $_POST['fullname'];
      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $img_tmp = $_POST['img_tmp'];
      $roles = 2;
      $sql = "INSERT INTO tbl_user (TenNguoiDung,TenDangNhap,MatKhau,Email,SoDienThoai,DiaChi,Hinh,role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
      try {
        $statement = $pdo->prepare($sql);
        $statement->execute([$fullname, $username,  $password, $email, $phone, $address, $img_tmp, $roles]);
?>
        <script>
          Swal.fire({
            icon: 'success',
            title: 'Thành công',
            text: 'Đăng ký thành công',
            footer: '<a href="index.php?page=login">Bạn có muốn đăng nhập bây giờ</a>'
          }).then(function() {
            window.location.href = 'index.php'
          });
        </script>
<?php
      } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
      }
    }
  }
}
?>
<main>
  <div class="container p-4">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col col-md-10">
        <div class="card bg-light shadow-lg" style="border-radius: 1rem">
          <div class="row">
            <div class="col-md-6 col-lg-5 d-none d-md-block bg-dark" style="border-radius: 1rem 0 0 1rem"></div>
            <div class="col-md-6 co l-lg-7 d-flex align-items-center">
              <div class="card-body p-4 text-black">
                <form action="" method="post">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <span class="h2 fw-bold">ĐĂNG KÝ</span>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label"><strong>Họ và tên</strong></label>
                    <input type="text" class="form-control form-control-lg" name="fullname" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label"><strong>Tên đăng nhập</strong></label>
                    <input type="text" class="form-control form-control-lg" name="username" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label"><strong>Email</strong></label>
                    <input type="email" class="form-control form-control-lg" name="email" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label"><strong>Mật khẩu</strong></label>
                    <input type="password" class="form-control form-control-lg" name="password" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label"><strong>Nhập lại mật khẩu</strong></label>
                    <input type="password" class="form-control form-control-lg" name="password" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label"><strong>Số điện thoại</strong></label>
                    <input type="tel" class="form-control form-control-lg" name="phone" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label"><strong>Địa chỉ</strong></label>
                    <input type="text" class="form-control form-control-lg" name="address" />
                  </div>
                  <input type="hidden" name="img_tmp" value='avatar.png'>
                  <div>
                    <input class="btn btn-dark btn-lg btn-block" type="submit" name="dangky" value="Tạo tài khoản" />


                  </div>
                  <p class="pt-3" style="color: #393f81">
                    Tôi đã có tài khoản?
                    <a href="#!" style="color: #393f81"></a><a href="index.php?page=login">đăng nhập</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>