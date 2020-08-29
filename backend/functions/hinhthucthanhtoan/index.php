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
        <h1>Danh sách hình thức thanh toán</h1>
            <?php
            include_once(__DIR__.'/../../../dbconnect.php');
        // 2. Query
        //here doc
            $sql=<<<EOT
            SELECT httt_ma , httt_ten FROM `hinhthucthanhtoan`;

EOT;
        //3. Yêu cầu PHP thực thi query 
        $result = mysqli_query($conn,$sql);
        //4. tạo mảng chứa dữ liệu
        $data =[];
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $data[] = array(
                'ma'=> $row['httt_ma'],
                'ten'=> $row['httt_ten'],
            );
        }
        ?> 
        <a href="create.php"><button type="button" class="btn btn-primary">Thêm mới</button></a> <br><br>
        <table border="1">
            <tr>
                <th>Mã Thanh Toán</th>
                <th>Tên Thanh Toán</th>
                <th>Hành động</th>
            </tr> 
            <?php foreach($data as $httt ) :?>
            <tr>
            
                    <td><?= $httt['ma']; ?></td>
                    <td><?= $httt['ten']; ?></td>
                    <td><a href="delete.php?idxoa=<?php echo $httt['ma'];?>"> XÓA</a> | 
                    <a href="edit.php?idupdate=<?php echo $httt['ma'];?>"> CẬP NHẬT</a></td>  
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
    </div>


    </div>
    <?php include_once(__DIR__.'/../../layouts/partials/footer.php');?>
    <?php include_once(__DIR__.'/../../layouts/scripts.php');?>

</body>
</html>