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
        <h1>Danh sách sản phẩm</h1>
            <?php
            include_once(__DIR__.'/../../../dbconnect.php');
        // 2. Query
        //here doc
            $sql=<<<EOT
            SELECT sp.*
            , lsp.lsp_ten
            , nsx.nsx_ten
            , km.km_ten, km.kh_noidung, km.kh_tungay, km.km_denngay
            FROM `sanpham` sp
            JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
            JOIN `nhasanxuat` nsx ON sp.nsx_ma = nsx.nsx_ma
            LEFT JOIN `khuyenmai` km ON sp.km_ma = km.km_ma
            ORDER BY sp.sp_ma DESC
EOT;
        //3. Yêu cầu PHP thực thi query 
        $result = mysqli_query($conn,$sql);
        //4. tạo mảng chứa dữ liệu
        $data =[];
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $km_tomtat='';
           
            if(!empty($row['km_ten'])){
                $km_tomtat = sprintf("Khuyến mãi:%s, Nội dung:%s Từ: %s đến %s",$row['km_ten'],$row['kh_noidung'], 
                                    date('d/m/Y', strtotime($row['kh_tungay'])), 
                                    date('d/m/Y', strtotime($row['km_denngay']))
                                );
            }
            $data[] = array(
                'sp_ma'=> $row['sp_ma'],
                'sp_ten'=> $row['sp_ten'],
                'sp_gia' => number_format($row['sp_gia'],0,".",",").'VND',
                'lsp_ten'=> $row['lsp_ten'],
                'nsx_ten' => $row['nsx_ten'],
                'km_tomtat' => $km_tomtat
            );
        }
        ?> 
        <a href="create.php"><button type="button" class="btn btn-primary">Thêm mới</button></a> <br><br>
        <table class="table table-bordered">
            <tr>
                <th>Mã SP</th>
                <th>Tên sản phâm</th>
                <th>Giá sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Nhà sản xuất</th>
                <th>Khuyến mãi</th>
                <th>Hành động</th>
            </tr> 
            <?php foreach($data as $httt ) :?>
            <tr>
                    <td><?= $httt['sp_ma']; ?></td>
                    <td><?= $httt['sp_ten']; ?></td>
                    <td><?= $httt['sp_gia']; ?></td>
                    <td><?= $httt['lsp_ten']; ?></td>
                    <td><?= $httt['nsx_ten']; ?></td>
                    <td><?= $httt['km_tomtat']; ?></td>
                    <td><a href="delete.php?idxoa=<?php echo $httt['ma'];?>" class=" btn btn-danger" > XÓA</a> 
                    <a href="edit.php?idupdate=<?php echo $httt['ma'];?>"class=" btn btn-success"> SỬA</a></td>  
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