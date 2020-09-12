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
                <h1>Hiệu chỉnh</h1>
                <?php
                    include_once(__DIR__.'/../../../dbconnect.php');
                    $sqlsanpham = "SELECT * FROM sanpham ";
                    $resultsanpham = mysqli_query($conn, $sqlsanpham);
                    $datasanpham = [];
                    while($rowsanpham = mysqli_fetch_array($resultsanpham, MYSQLI_ASSOC)){
                        $sp_tomtat='';
                        $sp_tomtat = sprintf("Sản phẩm: %s, Giá: %s",$rowsanpham['sp_ten'],
                                                number_format($rowsanpham['sp_gia'],2,",",".") ."VNĐ"); 
                        $datasanpham [] = array(
                            'sp_ma' => $rowsanpham['sp_ma'],
                            'sp_tomtat' => $sp_tomtat,
                        );
                    }
                    // Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
                    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
                    $hsp_ma = $_GET['idupdate'];
                    $sqlSelect = "SELECT * FROM `hinhsanpham` WHERE hsp_ma=$hsp_ma;";
                    // Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
                    $resultSelect = mysqli_query($conn, $sqlSelect);
                    $hinhsanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);

                ?> 
                <form name="frmhinhsanpham" id="frmhinhanpham" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Hình ảnh hiện tại</label>
                    <br />
                    <img src="/project-web/assets/uploads/products/<?= $hinhsanphamRow['hsp_tentaptin'] ?>" class="img-fluid" width="300px" />
                </div>
                    <div class="form-group">
                        <label for="sp_ma">Sản phẩm</label>
                        <select class="form-control" id="sp_ma" name="sp_ma">
                        <?php foreach ($datasanpham as $sanpham) : ?>
                            <option value="<?= $sanpham['sp_ma'] ?>"><?= $sanpham['sp_tomtat'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hsp_tentaptin">Tập tin ảnh</label>
                        <!-- Tạo khung div hiển thị ảnh cho người dùng Xem trước khi upload file lên Server -->
                        <div class="preview-img-container">
                        <img src="/project-web/assets/shared/img/img-default.png" id="preview-img" width="200px" />
                        </div>
                        <!-- Input cho phép người dùng chọn FILE -->
                        <input type="file" class="form-control" id="hsp_tentaptin" name="hsp_tentaptin">
                    </div>
                    <button class="btn btn-primary" name="btnsave">Lưu</button>
                    <a href="index.php" class="btn btn-outline-secondary" name="btnBack" id="btnBack">Quay về</a>
                    </form>
                <?php
                    if (isset($_POST['btnsave'])) {
                        $sp_ma = $_POST['sp_ma'];
                        if(isset($_FILES['hsp_tentaptin'])){
                            $upload_dir = __DIR__."/../../../assets/uploads/";
                            $subdir = 'products/';
                            // Đối với mỗi file, sẽ có các thuộc tính như sau:
                        // $_FILES['hsp_tentaptin']['name']     : Tên của file chúng ta upload
                        // $_FILES['hsp_tentaptin']['type']     : Kiểu file mà chúng ta upload (hình ảnh, word, excel, pdf, txt, ...)
                        // $_FILES['hsp_tentaptin']['tmp_name'] : Đường dẫn đến file tạm trên web server
                        // $_FILES['hsp_tentaptin']['error']    : Trạng thái của file chúng ta upload, 0 => không có lỗi
                        // $_FILES['hsp_tentaptin']['size']     : Kích thước của file chúng ta upload
                        // 3.1. Chuyển file từ thư mục tạm vào thư mục Uploads
                        // Nếu file upload bị lỗi, tức là thuộc tính error > 0
                        if ($_FILES['hsp_tentaptin']['error'] > 0) {
                            echo 'File Upload Bị Lỗi'; die;
                            }
                            else{

                                // Xóa file cũ để tránh rác trong thư mục UPLOADS
                                // Kiểm tra nếu file có tổn tại thì xóa file đi
                                $old_file = $upload_dir . $subdir . $hinhsanphamRow['hsp_tentaptin'];
                                if (file_exists($old_file)) {
                                    // Hàm unlink(filepath) dùng để xóa file trong PHP
                                    unlink($old_file);
                                  }
                    
                                $hsp_tentaptin = $_FILES['hsp_tentaptin']['name'];
                                $tentaptin = date('YmdHis') . '_' . $hsp_tentaptin; //20200530154922_hoahong.jpg
                                move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'], $upload_dir . $subdir . $tentaptin);
                
                            }
                        // 3.2. Lưu thông tin file upload vào database
                        // Câu lệnh INSERT
                        $sql = "INSERT INTO `hinhsanpham` (hsp_tentaptin, sp_ma) VALUES ('$tentaptin', $sp_ma);";
                        // print_r($sql); die;
                        // Thực thi INSERT
                        mysqli_query($conn, $sql);
                        // Đóng kết nối
                        mysqli_close($conn);
                        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
                        echo '<script>location.href = "index.php";</script>';
                
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <?php include_once(__DIR__.'/../../layouts/partials/footer.php');?>
    <?php include_once(__DIR__.'/../../layouts/scripts.php');?>
    <script>
    // Hiển thị ảnh preview (xem trước) khi người dùng chọn Ảnh
    const reader = new FileReader();
    const fileInput = document.getElementById("hsp_tentaptin");
    const img = document.getElementById("preview-img");
    reader.onload = e => {
      img.src = e.target.result;
    }
    fileInput.addEventListener('change', e => {
      const f = e.target.files[0];
      reader.readAsDataURL(f);
    })
  </script>

</body>
</html>