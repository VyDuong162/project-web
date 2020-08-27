<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>While PHP</h1>
    <?php
        include_once(__DIR__.'/../dbconnect.php');
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
                <td><a href="xuly_xoa.php?idxoa=<?php echo $httt['ma'];?>"> XÓA</a> | 
                <a href="xuly_xoa.php?idupdate=<?php echo $httt['ma'];?>"> CẬP NHẬT</a></td>  
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>