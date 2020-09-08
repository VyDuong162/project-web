<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <?php include_once(__DIR__.'/../../layouts/style.php');?>
</head>
<body>
    <?php include_once(__DIR__.'/../../layouts/partials/header.php');?>
    <div class="container">
        <div class="row">
    <?php include_once(__DIR__.'/../../layouts/partials/sildebar.php');?>
        <div class="col-md-8">
        <?php
        
            // Truy vấn database để lấy danh sách
            // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
            include_once(__DIR__.'/../../../dbconnect.php');
            $id=$_GET['idxoa'];
            
            $sql =<<<EOT
            DELETE  FROM sanpham WHERE sp_ma=$id
EOT;
        
            // 3. Thực thi
            mysqli_query($conn, $sql) or die("<b>Có lỗi khi thực thi câu lệnh SQL: </b>" . mysqli_error($conn) . "<br /><b>Câu lệnh vừa thực thi:</b></br>$sql");
            header('location:index.php');
        ?>
        </div>
    </div>


    </div>
    <?php include_once(__DIR__.'/../../layouts/partials/footer.php');?>
    <?php include_once(__DIR__.'/../../layouts/scripts.php');?>

</body>
</html>