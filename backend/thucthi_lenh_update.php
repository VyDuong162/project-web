<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thực thi câu lệnh UPDATE </title>
</head>
<body>
    <h1>UPDATE PHP</h1>
    <?php
         // Truy vấn database để lấy danh sách
         // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
         include_once(__DIR__.'/../../dbconnect.php');
         $httt_ma=2;
         $httt_ten='Bằng phương thức..';
         $sql =<<<EOT
         UPDATE sanpham
            SET
		        httt_ten= N'$httt_ten'
	        WHERE 
		        httt_ma=N'$httt_ma';
EOT;
         // 3. Thực thi
        mysqli_query($conn, $sql);
    ?>
</body>
</html>