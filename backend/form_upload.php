<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form hình thức thanh toán mới</h1>
    <form name="frm_thanhtoan" id="frm_thanhtoan" action="" method="post">
    Tên mới: <input type="text" name="txt_tenmoi" id="txt_tenmoi">
     <input type="submit" name="btn_luuten" id="btn_luuten" value="Lưu tên mới">
    </form>
    <?php
        if(isset($_POST['btn_luuten'])){
        // Truy vấn database để lấy danh sách
         // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
         include_once(__DIR__.'/../../dbconnect.php');
         
             $httt_ten = $_POST['txt_tenmoi'];
             $sql ="INSERT INTO `hinhthucthanhtoan`(httt_ten) VALUES('N{$httt_ten}');";
             mysqli_query($conn, $sql);
         }
        ?>
</body>
</html>