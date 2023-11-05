<?php
ob_start();
session_start();
include_once __DIR__ . '/../admincp/modules/header.php';
require_once __DIR__ . '/config/config.php';
if ((isset($_POST['dangnhap'])) && ($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $stmt =  $pdo->prepare("SELECT * FROM tbl_user WHERE TenDangNhap LIKE '%$username%' AND  MatKhau LIKE '%$password%'");
    $stmt->execute();
    $row_count = $stmt->rowCount();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetch();
    if ($row_count > 0) {
        $role = $kq['role'];
        if ($role == 1) {
            $_SESSION['loginAD'] = [];
            $_SESSION['loginAD']['username'] =  $username;
            $_SESSION['loginAD']['password'] =  $password;
            $_SESSION['loginAD']['fullname'] =  $kq['TenNguoiDung'];
            $_SESSION['role'] = $role;
?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: 'Đăng nhập thành công',
                    footer: '<a href="">Why do I have this issue?</a>'
                }).then(function() {
                    window.location.href = 'index.php'
                });
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Truy cập',
                    text: 'Bạn không có quyền truy cập trang này!',
                })
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Bạn là ai',
                text: 'Tài khoản hoặc mật khẩu không tồn tại!',
            })
        </script>
<?php
    }
}






?>



<main>
    <div class="container p-4">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-xl-10">
                <div class="card bg-light shadow-lg" style="border-radius: 1rem">
                    <div class="row">
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 text-black">
                                <form <?php echo $_SERVER['PHP_SELF']; ?> method="POST" id="signupForm">
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <span class="h2 fw-bold">ĐĂNG NHẬP</span>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="username"><strong>Tên đăng nhập</strong></label>
                                        <input type="text" id="firstname" name="username" class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for=""><strong>Mật khẩu</strong></label>
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                    </div>
                                    <div class="mb-3">
                                        <input class="btn btn-dark btn-lg btn-block" type="submit" name="dangnhap" />
                                    </div>
                                    <?php
                                    if ((isset($txt_error)) && ($txt_error != "")) {
                                        echo "<font color = 'red font-size: 10px'>" . $txt_error . "</font>";
                                    }
                                    ?>
                                    <div>
                                        <a class="small text-muted" href="#">Quên mật khẩu?</a>
                                        <p class="pt-1 mb-0" style="color: #393f81">
                                            Tôi chưa có tài khoản?
                                            <a href="#!" style="color: #393f81"></a><a href="register.html">Đăng Ký</a>
                                        </p>


                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 d-none d-md-block bg-dark" style="border-radius: 0 1rem 1rem 0"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>