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
            <h1>Thêm mới hình thức thanh toán</h1>
            <form name="frm_thanhtoan" id="frm_thanhtoan" action="" method="post">
            Tên mới: <input type="text" name="txt_tenmoi" id="txt_tenmoi">
            <input type="submit" name="btn_luuten" id="btn_luuten" value="Lưu tên mới">
             <a href="index.php"><button type="button" class="btn btn-outline-primary">Danh sách</button></a> <br>
            </form>
            <?php
                include_once(__DIR__ . '/../../../dbconnect.php');
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
        </div>
    </div>


    </div>
    <?php include_once(__DIR__.'/../../layouts/partials/footer.php');?>
    <?php include_once(__DIR__.'/../../layouts/scripts.php');?>

</body>
</html>