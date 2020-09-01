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
                <label for="exampleInputEmail1"><h1>Thêm mới hình thức thanh toán</h1></label>
                <form name="frm_thanhtoan" id="frm_thanhtoan" action="" method="post">
                
            <div class="form-group">
            Tên mới:<input type="text" class="form-control" name="txt_tenmoi" id="txt_tenmoi" aria-describedby="emailHelp">
            </div>
            <input type="submit" name="btn_luuten" id="btn_luuten" value="Lưu tên mới">
             <a href="index.php"><button type="button" class="btn btn-outline-primary">Danh sách</button></a> <br>
            </form>
            <?php
            //     if(isset($_POST['btn_luuten'])){
            //     // Truy vấn database để lấy danh sách
            //     // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
            //    // include_once(__DIR__.'/../../../dbconnect.php');
                
            //         $httt_ten = $_POST['txt_tenmoi'];
            //         $sql ="INSERT INTO `hinhthucthanhtoan`(httt_ten) VALUES(N'{$httt_ten}');";
            //         mysqli_query($conn, $sql);
            //     }
                ?>
            <!-- tách dữ liệu SERVER -->
            <?php
                 include_once(__DIR__.'/../../../dbconnect.php');
                 if (isset($_POST['btn_luuten'])) {
                    $tenmoi = $_POST['txt_tenmoi'];
                    $errors=[];
                    if (empty($tenmoi)) {
                        $errors['$tenmoi'][] = [
                          'rule' => 'required',
                          'rule_value' => true,
                          'value' => $tenmoi,
                          'msg' => 'Vui lòng nhập tên hình thức thanh toán'
                        ];
                      }
                    if (!empty($tenmoi) && strlen($tenmoi) < 3) {
                        $errors['$tenmoi'][] = [
                          'rule' => 'required',
                          'rule_value' => true,
                          'value' => $tenmoi,
                          'msg' => 'Tên hình thức thanh toán phải có ít nhất 3 ký tự'
                        ];
                      }
                    if (!empty($tenmoi) && strlen($tenmoi) <= 50) {
                        $errors['$tenmoi'][] = [
                          'rule' => 'required',
                          'rule_value' => true,
                          'value' => $tenmoi,
                          'msg' => 'Tên hình thức thanh toán không được vượt quá 50 ký tự'
                        ];
                      }
                 }
            ?>  
             <?php if (
                         isset($_POST['btn_luuten'])  // Nếu người dùng có bấm nút "Lưu dữ liệu"
                         && isset($errors)         // Nếu biến $errors có tồn tại
                         && (!empty($errors))      // Nếu giá trị của biến $errors không rỗng
                    ) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    <?php foreach ($errors as $fields) : ?>
                        <?php foreach ($fields as $rude) : ?>
                        <li><?php echo $rude['msg']; ?></li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>

            </div>

             <?php endif; ?>
        </div>
     </div>   
    <?php include_once(__DIR__.'/../../layouts/partials/footer.php');?>
    <?php include_once(__DIR__.'/../../layouts/scripts.php');?>
    <!-- <script>
         $(document).ready(function(){
            $("#frm_thanhtoan").validate({
                rules: {
                    txt_tenmoi: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
              },
              messages: {
                    txt_tenmoi : {
                        required: "Vui lòng nhập tên hình thức thanh toán",
                        minlength: "tên hình thức thanh toán phải có ít nhất 3 ký tự",
                        maxlength: "tên hình thức thanh toán không được vượt quá 50 ký tự"
                    },
                },
                },
        errorElement: "em",
        errorPlacement: function(error, element) {
          // Thêm class `invalid-feedback` cho field đang có lỗi
          error.addClass("invalid-feedback");
          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
          } else {
            error.insertAfter(element);
          }
        },
        success: function(label, element) {},
        highlight: function(element, errorClass, validClass) {
          $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).addClass("is-valid").removeClass("is-invalid");
        }
            });
        });
    </script> -->
</body>
</html>