<h1>DELETE PHP</h1>
    <?php
       
         // Truy vấn database để lấy danh sách
         // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
         include_once(__DIR__.'/../dbconnect.php');
         $id=$_GET['idxoa'];
         
        $sql =<<<EOT
        DELETE  FROM hinhthucthanhtoan WHERE httt_ma=$id
EOT;
       
         // 3. Thực thi
        mysqli_query($conn, $sql) or die("<b>Có lỗi khi thực thi câu lệnh SQL: </b>" . mysqli_error($conn) . "<br /><b>Câu lệnh vừa thực thi:</b></br>$sql");

    ?>