<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nền- web</title>
    <style>
        .them-light{
            background:#fff;
            color:#000;
        }
        .them-dark{
            background:#000;
            color:yellow;
        }
    </style>
    <?php
        $theme_class='theme-light';
        if (isset($_COOKIE['theme_class'])) {
            // Lấy thông tin từ COOKIE từ Web Browser của client gởi đến
            $theme_class = isset($_COOKIE['theme_class']) ? $_COOKIE['theme_class'] : 'theme-light';
        }
    
    ?>
</head>
<body class="<?= $theme_class ?>">
      <!-- Form Login -->
      <form name="frmLogin" method="post" action="">
        <label><input type="radio" name="theme" id="theme-1" value="theme-light" checked />Giao diện nền Sáng</label><br />
        <label><input type="radio" name="theme" id="theme-2" value="theme-dark" />Giao diện nền Tối</label><br />
        <input type="submit" name="btnSave" value="Lưu" />
    </form>
    <?php
        if(isset($_POST['btnSave'])){
            $theme = $_POST['theme'];
            setcookie('theme_class',$theme,time()+3600,'/');
            echo "<h2>Cấu hình đã được lưu!</h2>";

        }
    ?>
    
</body>
</html>