<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thực thi câu lệnh INSERT </title>
</head>
<body>
    <h1>INSERT PHP</h1>
    <?php
         // Truy vấn database để lấy danh sách
         // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
         include_once(__DIR__.'/../dbconnect.php');
         $tenphuongthuc='Chuyển qua ATM';
         $sql ="INSERT INTO `sanpham`(TENSP) VALUES('N{$tenphuongthuc}');";
         // 3. Thực thi
        mysqli_query($conn, $sql);
    ?>
</body>
</html>