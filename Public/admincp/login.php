<?php
session_start();
ob_start();
include_once __DIR__ . '/../admincp/modules/header.php';
include "../admincp/config/config.php";
include "../admincp/config/user.php";

if ((isset($_POST['dangnhap'])) && ($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $role=checkUser($username, $password);
    // 1 la role cua admin
    if ($role == 1) {
        $_SESSION['role'] = $role;
        header('location: index.php');
    }
    // 2 la role cua user
    elseif ($role == 2) { 

        $_SESSION['role'] = $role;
        echo'user';            
    } else {
        echo 'tai khoan matasdsad';
    }
}
       





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập ADMIN</title>
</head>

<body>

    <main>
        <div class="container p-4">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-xl-10">
                    <div class="card bg-light shadow-lg" style="border-radius: 1rem">
                        <div class="row">
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 text-black">
                                    <form  <?php echo $_SERVER['PHP_SELF']; ?> method="POST" id="signupForm">
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






















</body>

</html>
<p style="color: red;"></p>