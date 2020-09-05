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
                <select name="lsp_ma" id="lsp_ma" >
                <?php foreach($loaisanpham as $lsp);?>

                <option value="<?php echo $loaisanpham['lsp_ma']?>"></option>
                <?php endforeach;?>
                </select>
            </div>
            <button class="btn btn-primary" name="btnsave" type="submit" >Lưu dữ liệu</button>
        </form>

        </div>
    </div>


    </div>
    <?php include_once(__DIR__.'/../../layouts/partials/footer.php');?>
    <?php include_once(__DIR__.'/../../layouts/scripts.php');?>

</body>
</html>