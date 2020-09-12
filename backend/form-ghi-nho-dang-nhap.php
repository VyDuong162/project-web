<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cookie PHP</h1>
    <?php
    // Kiểm tra xem Người dùng có sử dụng Ghi nhớ Đăng nhập không?
    if(isset($_COOKIE['is_logged'])) {
        // Lấy thông tin từ COOKIE từ Web Browser của client gởi đến
        $username_logged = isset($_COOKIE['username_logged']) ? $_COOKIE['username_logged'] : '';
        echo "Xin chào <b>$username_logged</b>! Bạn đã đăng nhập rồi.";
        echo "Bạn sẽ được chuyển đến trang chủ trong 5s;";
        echo '<script>setTimeout(function(){ window.location="/" }, 5000);</script>';
        die;
    }
    ?>

     <!-- Form Login -->
     <form name="frmLogin" method="post" action="">
        Tài khoản: <input type="text" name="username" id="username" /><br />
        Mật khẩu: <input type="text" name="password" id="password" /><br />
        Ghi nhớ đăng nhập: <input type="checkbox" name="remember_me" id="remember_me" value="1" /><br />
        <input type="submit" name="btnLogin" value="Đăng nhập" />
    </form>

    <?php
       if(isset($_POST['btnLogin'])){
           $username = $_POST['username'];
           $password = $_POST['password'];
           $remember_me = isset($_POST['remember_me']) ? 1 : 0;
           if($username == 'admin' && $password == '123456') {
                if($remember_me == 1) {
                    // Thiết lập Cookie "Ghi nhớ đăng nhập" trong 15' ~ 3600s
                    setcookie('is_logged', true, time()+ 3600, '/');
                    // Thiết lập Cookie "Tên username đã đăng nhập" trong 15' ~ 3600s
                    setcookie("username_logged", $username, time()+3600, "/","", 0);
                }

            // Hiển thị thông tin chào mừng
                echo "<h2>Xin chào $username!</h2>";
            } else {
                echo "Đăng nhập thất bại!";
            }
       }
    ?>
    
</body>
</html>