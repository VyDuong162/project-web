<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
    // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAYOUT-bạckend</title>
    <?php include_once(__DIR__.'/../layouts/style.php');?>
</head>
<body>
    <?php include_once(__DIR__.'/../layouts/partials/header.php');?>
    <div class="container">
        <div class="row">
        <div class="col-md-12">
        <?php
                // Đã đăng nhập rồi -> điều hướng về trang chủ
            if (isset($_SESSION['kh_tendangnhap_logged']) && !empty($_SESSION['kh_tendangnhap_logged'])) :
            ?>
                <h2>Bạn đã đăng nhập rồi. <a href="/php/myhand/backend/">Bấm vào đây để quay về trang chủ.</a></h2>
            <?php else : ?>
                <form name="frmLogin" id="frmLogin" method="post" action="">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card-group">
                                <div class="card p-4">
                                    <div class="card-body">
                                        <h1>Đăng nhập</h1>
                                        <p class="text-muted">Nhập thông tin Tài khoản</p>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control" type="text" name="kh_tendangnhap" placeholder="Tên đăng nhập">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-lock"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control" type="password" name="kh_matkhau" placeholder="Mật khẩu">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <button class="btn btn-primary px-4" name="btnLogin">Đăng nhập</button>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a class="btn btn-link px-0" href="forgot-password.php">Quên mật khẩu?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                                    <div class="card-body text-center">
                                        <div>
                                            <h2>Đăng ký</h2>
                                            <p>Đăng ký để làm thành viên của Trang web bán hàng. Bạn sẽ được một số quyền lợi nhất
                                                định khi làm thành viên của Chúng tôi.</p>
                                            <a class="btn btn-primary active mt-3" href="register.php">Đăng
                                                ký ngay!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
                // Hiển thị tất cả lỗi trong PHP
                // Chỉ nên hiển thị lỗi khi đang trong môi trường Phát triển (Development)
                // Không nên hiển thị lỗi trên môi trường Triển khai (Production)
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                // Truy vấn database
                // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
                include_once(__DIR__ . '/../../dbconnect.php');
                // Chưa đăng nhập -> Xử lý logic/nghiệp vụ kiểm tra Tài khoản và Mật khẩu trong database
                if (isset($_POST['btnLogin'])) {
                    // Phân tách thông tin từ người dùng gởi đến qua Request POST
                    $kh_tendangnhap = $_POST['kh_tendangnhap'];
                    $kh_matkhau = $_POST['kh_matkhau'];
                    // Câu lệnh SELECT Kiểm tra đăng nhập...
                    $sqlSelect = <<<EOT
                    SELECT *
                    FROM khachhang kh
                    WHERE kh.kh_tendangnhap = '$kh_tendangnhap' AND kh.kh_matkhau = '$kh_matkhau';
EOT;
                    // Thực thi SELECT
                    $result = mysqli_query($conn, $sqlSelect);
                    // Sử dụng hàm `mysqli_num_rows()` để đếm số dòng SELECT được
                    // Nếu có bất kỳ dòng dữ liệu nào SELECT được <-> Người dùng có tồn tại và đã đúng thông tin USERNAME, PASSWORD
                    if (mysqli_num_rows($result) > 0) {
                        // Lưu thông tin Tên tài khoản user đã đăng nhập
                        $_SESSION['kh_tendangnhap_logged'] = $kh_tendangnhap;
                        echo 'Đăng nhập thành công!';
                        // Điều hướng (redirect) về trang chủ
                        echo '<script>location.href = "/project-web/backend/pages/dashboard.php";</script>';
                    } else {
                        echo '<h2 style="color: red;">Đăng nhập thất bại!</h2>';
                    }
                }
            endif;
            ?>
        </div>
    </div>


    </div>
    <?php include_once(__DIR__.'/../layouts/partials/footer.php');?>
    <?php include_once(__DIR__.'/../layouts/scripts.php');?>

</body>
</html>