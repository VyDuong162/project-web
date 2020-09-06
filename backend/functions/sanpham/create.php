<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <?php include_once(__DIR__.'/../../layouts/style.php');?>
</head>
<body>
    <?php include_once(__DIR__.'/../../layouts/partials/header.php');?>
    <div class="container">
        <div class="row">
    <?php include_once(__DIR__.'/../../layouts/partials/sildebar.php');?>
        <div class="col-md-8">
        <h1>Thêm mới sản phẩm</h1>
        <?php
            include_once(__DIR__.'/../../../dbconnect.php');
            $sqlloaisanpham = "SELECT * FROM loaisanpham ";
            $resultloaisanpham = mysqli_query($conn, $sqlloaisanpham);
            $dataloaisanpham = [];
            while($rowloaisanpham = mysqli_fetch_array($resultloaisanpham, MYSQLI_ASSOC)){
                $dataloaisanpham [] = array(
                    'lsp_ma' => $rowloaisanpham['lsp_ma'],
                    'lsp_ten' => $rowloaisanpham['lsp_ten'],
                    'lsp_mota' => $rowloaisanpham['lsp_mota'],
                );
            }
            $sqlNhaSanXuat = "select * from `nhasanxuat`";
            // Thực thi câu truy vấn SQL để lấy về dữ liệu
            $resultNhaSanXuat = mysqli_query($conn, $sqlNhaSanXuat);
            // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
            // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
            // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
            $dataNhaSanXuat = [];
            while ($rowNhaSanXuat = mysqli_fetch_array($resultNhaSanXuat, MYSQLI_ASSOC)) {
                $dataNhaSanXuat[] = array(
                    'nsx_ma' => $rowNhaSanXuat['nsx_ma'],
                    'nsx_ten' => $rowNhaSanXuat['nsx_ten'],
                );
            }
            /* --- End Truy vấn dữ liệu Nhà sản xuất --- */
            /*--- 4. Truy vấn dữ liệu Khuyến mãi
                --- 
                */
                // Chuẩn bị câu truy vấn Khuyến mãi
                $sqlKhuyenMai = "select * from `khuyenmai`";
                $resultKhuyenMai = mysqli_query($conn, $sqlKhuyenMai);
                $dataKhuyenMai =[];
                while($rowKhuyenMai = mysqli_fetch_array($resultKhuyenMai, MYSQLI_ASSOC)){
                    $km_tomtat='';
                   
                    if(!empty($rowKhuyenMai['km_ten'])){
                        $km_tomtat = sprintf("Khuyến mãi:%s, Nội dung:%s Thời gian: %s - %s",$rowKhuyenMai['km_ten'],$rowKhuyenMai['kh_noidung'], 
                                            date('d/m/Y', strtotime($rowKhuyenMai['kh_tungay'])), 
                                            date('d/m/Y', strtotime($rowKhuyenMai['km_denngay']))
                                        );
                    }
                    $dataKhuyenMai[] = array(
                        'sp_ma'=> $rowKhuyenMai['sp_ma'],
                        'km_tomtat' => $km_tomtat,
                    );
                }
        ?> 
        <form name="frmthemmoi" id="frmthemmoi" action="" method="post">
            <div class="form-group">
                <label for="sp_ten">Tên Sản phẩm</label>
                <input type="text" class="form-control" id="sp_ten" name="sp_ten" placeholder="Tên Sản phẩm" value="">
            </div>
            <div class="form-group">
                <label for="sp_gia">Giá Sản phẩm</label>
                <input type="text" class="form-control" id="sp_gia" name="sp_gia" placeholder="Giá Sản phẩm" value="">
            </div>
            <div class="form-group">
                <label for="sp_giacu">Giá cũ Sản phẩm</label>
                <input type="text" class="form-control" id="sp_giacu" name="sp_giacu" placeholder="Giá cũ Sản phẩm" value="">
            </div>
            <div class="form-group">
                <label for="sp_mota_ngan">Mô tả ngắn</label>
                <input type="text" class="form-control" id="sp_mota_ngan" name="sp_mota_ngan" placeholder="Mô tả ngắn Sản phẩm" value="">
            </div>
            <div class="form-group">
                <label for="sp_mota_chitiet">Mô tả chi tiết</label>
                <input type="text" class="form-control" id="sp_mota_chitiet" name="sp_mota_chitiet" placeholder="Mô tả chi tiết Sản phẩm" value="">
            </div>
            <div class="form-group">
                <label for="sp_ngaycapnhat">Ngày cập nhật</label>
                <input type="text" class="form-control" id="sp_ngaycapnhat" name="sp_ngaycapnhat" placeholder="Ngày cập nhật Sản phẩm" value="">
            </div>
            <div class="form-group">
                <label for="sp_soluong">Số lượng</label>
                <input type="text" class="form-control" id="sp_soluong" name="sp_soluong" placeholder="Số lượng Sản phẩm" value="">
            </div>
            <div class="form-group">
                <label for="sp_lsp">Loại sản phẩm</label>
                <select class="form-control" name="lsp_ma" id="lsp_ma" >
                <?php foreach($dataloaisanpham as $lsp):?>
                <option value="<?php echo $lsp['lsp_ma']?>"><?php echo $lsp['lsp_ten']?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="sp_nsx">Nhà sản xuất</label>
                <select class="form-control" name="nsx_ma" id="nsx_ma" >
                <?php foreach($dataNhaSanXuat as $nsx):?>
                <option value="<?php echo $nsx['nsx_ma']?>"><?php echo $nsx['nsx_ten']?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="sp_km">Khuyến mãi </label>
                <select class="form-control" name="km_ma" id="km_ma" >
                <?php foreach($dataKhuyenMai as $km):?>
                <option value="<?= $km['km_ma']?>"><?= $km['km_tomtat']?></option>
                <?php endforeach;?>
                </select>
            </div>
            <button class="btn btn-primary" name="btnsave" type="submit" >Lưu dữ liệu</button>
        </form>
            <?php
             if (isset($_POST['btnSave'])) {
                // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
                $ten = $_POST['sp_ten'];
                $gia = $_POST['sp_gia'];
                $giacu = $_POST['sp_giacu'];
                $motangan = $_POST['sp_mota_ngan'];
                $motachitiet = $_POST['sp_mota_chitiet'];
                $ngaycapnhat = $_POST['sp_ngaycapnhat'];
                $soluong = $_POST['sp_soluong'];
                $lsp_ma = $_POST['lsp_ma'];
                $nsx_ma = $_POST['nsx_ma'];
                $km_ma = (empty($_POST['km_ma']) ? 'NULL' : $_POST['km_ma']);
                // Câu lệnh INSERT
                $sql = "INSERT INTO `sanpham` (sp_ten, sp_gia, sp_giacu, sp_mota_ngan, sp_mota_chitiet, sp_ngaycapnhat, sp_soluong, lsp_ma, nsx_ma, km_ma) 
                VALUES ('$ten', $gia, $giacu, '$motangan', '$motachitiet', '$ngaycapnhat', $soluong, $lsp_ma, $nsx_ma, $km_ma);";
                // Thực thi INSERT
                mysqli_query($conn, $sql);
                // Đóng kết nối
                mysqli_close($conn);
                // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
                echo "<script>location.href = 'index.php';</script>";
            }
            ?>
        </div>
    </div>


    </div>
    <?php include_once(__DIR__.'/../../layouts/partials/footer.php');?>
    <?php include_once(__DIR__.'/../../layouts/scripts.php');?>

</body>
</html>