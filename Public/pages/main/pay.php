<?php
require_once __DIR__ . '/../../admincp/config/config.php';
include_once __DIR__ . '/../header.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['pay']) && $_POST['pay']) {
        $userid = $_SESSION['login']['username'];
        $sqltmp = "SELECT * FROM cart WHERE TenTaiKhoan LIKE '%$userid%' AND MaDonHang = 0";
        $stmt = $pdo->prepare($sqltmp);
        $stmt->execute();
        $SoLuongSP = $stmt->rowCount();
        $TenNguoiNhan = $_POST['TenNguoiNhan'];
        $SoDienThoai = $_POST['SoDienThoai'];
        $EmailNhan = $_POST['EmailNhan'];
        $DiaChi = $_POST['DiaChi'];
        $status = 'pending';
        $ship = $_POST['shippingMethodf'];
        if (empty($TenNguoiNhan) || empty($SoDienThoai) || empty($DiaChi) || empty($EmailNhan)) {
            echo "Vui lòng điền đầy đủ thông tin.";
        } elseif ($SoLuongSP == 0) {
        } else {
            $idcode = rand(0, 999);
            $sql = "INSERT INTO payment (id,TenKhachHang, TKKhachHang,SoDienThoai,Email, DiaChi,TongSP,Ship,TongTien)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                $idcode,
                $TenNguoiNhan,
                $userid,
                $SoDienThoai,
                $EmailNhan,
                $DiaChi,
                $SoLuongSP,
                $ship,
                $sum + $ship
            ]);
            $stmt2 = $pdo->prepare("UPDATE cart SET MaDonHang=$idcode WHERE TenTaiKhoan LIKE '%$userid%' AND MaDonHang = 0");
            $stmt2->execute();
?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Thanh toán thành công ',
                    text: 'Cảm ơn vì đã mua hàng',
                    footer: '<a href="">Why do I have this issue?</a>'
                }).then(function() {
                    window.location.href = 'index.php'
                });
            </script>
<?php
        }
    }
    // $pdo = null;
}
?>



<main class="bg-light pt-4 rounded">
    <form method="POST" action="">
        <!-- Đia chỉ  và  vận chuyển  -->
        <div class="container bg-white rounded pt-3">
            <h3>THANH TOÁN </h3>
            <hr>
            <div class="row bg">
                <div class="col-md-6">
                    <h5>ĐỊA CHỈ GIAO HÀNG</h5>


                    <div class="form-group row pt-2">
                        <label for="TenNguoiNhan" class="col-md-4 col-form-label">Họ và tên người nhận: </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="TenNguoiNhan" name="TenNguoiNhan" placeholder="Nhập họ và tên người nhận">
                        </div>
                    </div>
                    <div class="form-group row pt-2">
                        <label for="EmaiNhan" class="col-md-4 col-form-label">Email: </label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" id="EmailNhan" name="EmailNhan" placeholder="Nhập địa chỉ mail">
                        </div>
                    </div>
                    <div class="form-group row pt-2">
                        <label for="SoDienThoai" class="col-md-4 col-form-label">Số điện thoại: </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="SoDienThoai" name="SoDienThoai" placeholder="Nhập số điện thoại">
                        </div>
                    </div>




                    <div class="form-group row pt-2">
                        <label for="DiaChi" class="col-md-4 col-form-label">Địa chỉ: </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="DiaChi" name="DiaChi" placeholder="Nhập địa chỉ">
                        </div>
                    </div>


                </div>
                <div class="col-md-6 my-5">
                    <h5>PHƯƠNG THỨC VẬN CHUYỂN</h5>
                    <div class="form-check pt-3">
                        <input class="form-check-input" type="radio" name="shippingMethod" id="GiaoHangNhanh" value="Nhanh">
                        <input class="form-check-input" type="hidden" name="shippingMethodf" value="40000">
                        <label class="form-check-label" for="GiaoHangNhanh">
                            <strong>Giao hàng nhanh: 40.000 đ</strong>
                            <p>Thứ 7 - 2/11</p>
                        </label>
                    </div>
                    <div class="form-check pt-3">
                        <input class="form-check-input" type="radio" name="shippingMethod" id="GiaoHangTieuChuan" value="TieuChuan">
                        <input class="form-check-input" type="hidden" name="shippingMethodf" value="30000">
                        <label class="form-check-label" for="GiaoHangTieuChuan">
                            <strong>Giao hàng tiêu chuẩn: 30.000 đ</strong>
                            <p>Thứ 7 - 5/11</p>
                        </label>
                    </div>
                    <div class="form-check pt-3">
                        <input class="form-check-input" type="radio" name="shippingMethod" id="BuuDien" value="BuuDien">
                        <input class="form-check-input" type="hidden" name="shippingMethodf" value="20000">
                        <label class="form-check-label" for="BuuDien">
                            <strong>Bưu điện: 20.000 đ</strong>
                            <p>Thứ 7 - 8/11</p>
                        </label>
                    </div>
                </div>
            </div>

        </div>
        <div class="container bg-white rounded my-3">
            <div class="row">
                <div class="col-md-6 pt-3">
                    <h5>PHƯƠNG THỨC THANH TOÁN</h5>
                    <div class="form-check pt-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            <span>
                                <i class="fa-solid fa-money-bills fa-lg"></i>
                                <strong> Thanh toán bằng tiền mặt khi nhận hàng</strong>
                            </span>
                            <p>Thứ 7 - 8/11</p>
                        </label>
                    </div>
                </div>

                <div class="col-md-6 pt-3">
                    <h5>MÃ GIẢM GIÁ</h5>

                    <div class="form-group row pt-2">
                        <label for="inputName" class="col-md-3 col-form-label">Mã giảm giá: </label>
                        <div class="col-md-5 col-8">
                            <input type="text" class="form-control" id="inputName" placeholder="Nhập mã giảm giá">
                        </div>
                        <div class="col-md-4 col-4">
                            <a href="" class="btn btn-primary rounded " style="background-color: #38284f;">Áp dụng</a>
                        </div>
                    </div>
                    <p class="text-muted pt-2" style="font-size: 12px;">
                        Lưu ý: Mỗi đơn hàng chỉ áp dụng được 1 mã giảm giá
                    </p>

                </div>
            </div>

        </div>

        <div class="container bg-white rounded">
            <div class="row pt-3">
                <h5>ĐƠN HÀNG</h5>
            </div>
            <div class="row">
                <div class="col-md-6 col-6">
                    <div class="d-flex">
                        <p class="text-center"><strong>Sản Phẩm</strong></p>
                    </div>
                </div>
                <div class="col-md-2 col-2">
                    <p class="text-center"><strong>Số Lượng</strong></p>

                </div>
                <div class="col-md-4 col-4 d-flex justify-content-center  ">
                    <p><strong>Thành tiền</strong></p>
                </div>
            </div>
            <?php
            $sum = 0;
            if (isset($_SESSION["login"])) {
                $id_user = $_SESSION['login']['username'];
                $statement = $pdo->prepare("SELECT * FROM cart WHERE TenTaiKhoan LIKE '%$id_user%' AND MaDonHang=0");
                $statement->execute();
                $row_count = $statement->rowCount();
                $htmlspecialchars = 'htmlspecialchars';
                if ($row_count > 0) {
                    while ($row = $statement->fetch()) {
                        $sum += $htmlspecialchars($row['DonGia']) * $htmlspecialchars($row['SoLuong']);
            ?>
                        <div class="row ">
                            <!-- San pham 1 -->
                            <div class="col-md-6 col-6">
                                <div class="d-flex">
                                    <img src="../../admincp/modules/Manage_Book/uploads/<?php echo $htmlspecialchars($row['HinhAnh']) ?>" class="zoom_image_product_cart rounded me-3" style="width: 96px; height: 100px;" />
                                    <div class="">
                                        <a href="#" class="nav-link"> <?php echo $htmlspecialchars($row['TenSach']); ?></a>
                                        <p class="text-muted">
                                            <?php $idcate = $htmlspecialchars($row['MaTheLoai']);
                                            $sql = "SELECT TenTheLoai FROM category where MaTheLoai LIKE '%$idcate%' LIMIT 1 ";
                                            $statements = $pdo->prepare($sql);
                                            $statements->execute();
                                            $rows = $statements->fetch();
                                            echo $htmlspecialchars($rows['TenTheLoai']) ?>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2 col-2">
                                <div class="text-center">
                                    <?php echo  $htmlspecialchars($row['SoLuong']) ?>
                                </div>

                            </div>
                            <div class="col-md-4 col-4 d-flex justify-content-center ">
                                <p><?php echo number_format($htmlspecialchars($htmlspecialchars($row['DonGia']) * $htmlspecialchars($row['SoLuong'])), 0, ',', '.') . ' vnđ' ?></p>
                            </div>

                        </div>
                        <hr>
            <?php }
                }
            } ?>

            <hr>
            <div class="card shadow-0 border">
                <div class="card-body">
                    <h4 class="pt-1">Tóm Tắt</h4>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Thành Tiền:</p>
                        <p class="mb-2"><?php echo number_format($sum, 0, ',', '.') . ' vnđ'  ?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Phí Giao Hàng:</p>
                        <p class="mb-2" id="shippingCost">0</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Mã Giảm Giá:</p>
                        <p class="mb-2">0 vnđ</p>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Tổng Tiền:</p>
                        <p class="mb-2 fw-bold"><?php echo number_format($sum, 0, ',', '.') . ' vnđ'  ?></p>
                    </div>

                </div>
            </div>

        </div>
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-9 col-6 pt-2">
                    <a href="cart.html" class="text-muted"> <i class="fa-solid fa-arrow-left"></i> Trở về đơn hàng </a>

                </div>

                <div class="col-md-3 col-6 d-flex justify-content-end">

                    <input type="submit" name="pay" class="btn w-100 shadow-0 mb-2 text-white" style="background-color:#38284f ;" value='Thanh Toán'>
                </div>

            </div>

        </div>




    </form>
    <script>
        $(document).ready(function() {
            const PhuongThuc = {
                'Nhanh': 40000,
                'TieuChuan': 30000,
                'BuuDien': 20000
            };

            function phivanchuyen() {
                const chonPhuongThuc = $('input[name="shippingMethod"]:checked').val();
                let temp = parseFloat($('#totalAmount').data('amount'));
                const previous_select = parseFloat($('#shippingCost').text().replace(' đ', '').trim());
                temp -= previous_select;
                const new_select = PhuongThuc[chonPhuongThuc] || 0;
                temp += new_select;
                $('#shippingCost').text(new_select.toFixed(2).replace(/\.00$/, '') + ' đ');
                // $('#totalAmount').text(temp.toFixed(2) + ' đ');
            }
            phivanchuyen();
            $('input[name="shippingMethod"]').change(phivanchuyen);
        });
    </script>


</main>