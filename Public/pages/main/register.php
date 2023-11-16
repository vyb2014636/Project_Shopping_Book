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
      $img = $_POST['img_tmp'];
      $roles = 2;
      $sql = "INSERT INTO tbl_user (TenNguoiDung,TenDangNhap,MatKhau,Email,SoDienThoai,DiaChi,Hinh,role) VALUES (?, ?, ?, ?, ?, ?, ? ,? )";
      try {
        $statement = $pdo->prepare($sql);
        $statement->execute([$fullname, $username,  $password, $email, $phone, $address, $img, $roles]);
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
              <div class="card-body p-4 text-black" id="signupForm">
                <form action="" method="post">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <span class="h2 fw-bold">ĐĂNG KÝ</span>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label"><strong>Họ và tên</strong></label>
                    <input type="text" class="form-control form-control-lg" name="fullname" id="fullname" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label"><strong>Tên đăng nhập</strong></label>
                    <input type="text" class="form-control form-control-lg" name="username" id="username" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label"><strong>Email</strong></label>
                    <input type="email" class="form-control form-control-lg" name="email" id="email" />
                  </div>
                  <div class=" form-outline mb-4">
                    <label class="form-label"><strong>Mật khẩu</strong></label>
                    <input type="password" class="form-control form-control-lg" name="password" id="password" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label"><strong>Nhập lại mật khẩu</strong></label>
                    <input type="password" class="form-control form-control-lg" name="password" id="confirm_password" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label"><strong>Số điện thoại</strong></label>
                    <input type="tel" class="form-control form-control-lg" name="phone" id="phone" />
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
<script>
  $.validator.setDefaults({
    submitHandler: function() {
      alert('submitted!');
    },
  });

  $(document).ready(function() {
    $('#signupForm').validate({
      rules: {
        fullname: 'required',
        username: {
          required: true,
          minlength: 6,
          maxlength: 16
        },
        password: {
          required: true,
          minlength: 9,
          maxlength: 16
        },
        confirm_password: {
          required: true,
          minlength: 5,
          maxlength: 16,
          equalTo: '#password',
        },
        email: {
          required: true,
          email: true
        },
        phone: {
          required: true,
          minlength: 10,
          maxlength: 10,

          digits: true,
        },
        address: 'required'

      },
      messages: {
        fullname: 'Bạn chưa nhập họ và tên của bạn',
        username: {
          required: 'Bạn chưa nhập tên đăng nhập',
          minlength: 'Tên dăng nhập phải có ít nhất 6 ký tự ',
          maxlength: 'Tên dăng nhập phải có tối đa 16 ký tự'
        },
        password: {
          required: 'Bạn chưa nhập mật khẩu',
          minlength: 'Mật khẩu phải có ít nhất 9 ký tự ',
          maxlength: 'Mật khẩu phải có tối đa 16 ký tự'
        },
        confirm_password: {
          required: 'Bạn chưa nhập mật khẩu',
          minlength: 'Mật khẩu phải có ít nhất 5 ký tự ',
          equalTo: 'Mật khẩu không trùng với mật khẩu đã nhập '
        },
        email: {
          required: 'Bạn chưa nhập email',
          email: 'Email không hợp lệ'

        },
        phone: {
          required: 'Bạn chưa nhập số điện thoại',
          minlength: 'Số điện thoại phải có 10 ký tự',
          maxlength: 'Số điện thoại phải có 10 ký tự',
          digits: 'Số điện thoại chỉ được chứa chữ số',
        },
        address: 'Bạn chưa nhập địa chỉ'
      },
      errorElement: 'div',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        if (element.prop('type') == 'checkbox') {
          error.insertAfter(element.siblings('label'));
        } else {
          error.insertAfter(element);
        }
      },

    });
  });
</script>