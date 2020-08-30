<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐIỀN FORM UPDATE DỮ LIỆU</title>
</head>

<body>
    <?php
    include_once(__DIR__ . '/../../dbconnect.php');
    $id = $_GET['idupdate'];
    $sql_select = <<<EOT
        SELECT  httt_ma, httt_ten  FROM `hinhthucthanhtoan` WHERE httt_ma='$id';
EOT;
    $result_select = mysqli_query($conn, $sql_select);
    $htttdata = [];
    while ($row = mysqli_fetch_array($result_select, MYSQLI_ASSOC)) {
        $htttdata = array(
            'ma' => $row['httt_ma'],
            'ten' => $row['httt_ten'],
        );
    }

    ?>
    <h1>UPDATE hình thức thanh toán</h1>
    <form name="frm_update" id="frm_update" action="" method="post">
        Tên phương thức: <br><input type="text" name="txt_ten" id="txt_ten" value="<?php echo $htttdata['ten'] ?>"> <br> <br>
        <button type="submit" name="btn_luudulieu" id="btn_luudulieu">Lưu dữ liệu</button>
    </form>
    <?php
    if (isset($_POST['btn_luudulieu'])) {
        $tenthanhtoan = $_POST['txt_ten'];
        $sql_update = <<<EOT
            UPDATE hinhthucthanhtoan
            SET
		        httt_ten= '$tenthanhtoan'
	        WHERE 
		        httt_ma='$id'
EOT;

        mysqli_query($conn, $sql_update)  or die("<b>Có lỗi khi thực thi câu lệnh SQL: </b>" . mysqli_error($conn) . "<br /><b>Câu lệnh vừa thực thi:</b></br>$sql_update");
    }

    ?>
</body>

</html>