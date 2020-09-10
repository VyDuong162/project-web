<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <?php include_once(__DIR__ . '/../../layouts/style.php'); ?>
    <link rel="stylesheet" href="/project-web/assets/vendor/DataTables/datatables.min.css" type="text/css">
    <link href="/project-web/assets/vendor/DataTables/Buttons-1.6.3/css/buttons.bootstrap4.min.css" type="text/css" rel="stylesheet" />

</head>

<body>
    <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once(__DIR__ . '/../../layouts/partials/sildebar.php'); ?>
            <div class="col-md-8">
                <div class="text-center">
                    <h1 class="h2">Danh sách hình sản phẩm</h1>
                </div>
                <?php
                include_once(__DIR__ . '/../../../dbconnect.php');
                // 2. Query
                //here doc
                $sql = <<<EOT
            SELECT * 
            FROM hinhsanpham hsp
            JOIN sanpham sp ON hsp.sp_ma=sp.sp_ma
EOT;
                //3. Yêu cầu PHP thực thi query 
                $result = mysqli_query($conn, $sql);
                //4. tạo mảng chứa dữ liệu
                $data = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $sp_tomtat = sprintf(
                        "Sản phẩm %s, giá: %d",
                        $row['sp_ten'],
                        number_format($row['sp_gia'], 2, ".", ",") . ' vnđ'
                    );
                    $data[] = array(
                        'hsp_ma' => $row['hsp_ma'],
                        'hsp_tentaptin' => $row['hsp_tentaptin'],
                        'sp_tomtat' => $sp_tomtat,
                    );
                }
                ?>
                <a href="create.php"><button type="button" class="btn btn-primary">Thêm mới</button></a> <br><br>

                <table id="id_danhsach" class="table mx-auto table-bordered">
                    <thead>
                        <tr>
                            <th>Mã hình sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="tbody-dark">
                        <?php foreach ($data as $hsp) : ?>
                            <tr>
                                <td><?= $hsp['hsp_ma']; ?></td>
                                <td><img src="/project-web/assets/uploads/products/<?= $hsp['hsp_tentaptin'] ?>" class="img-fluid" width="100px" /></td>
                                <td><?= $hsp['sp_tomtat']; ?></td>
                                <td><a href="edit.php?idupdate=<?php echo $hsp['hsp_ma']; ?>" class=" btn btn-success"> SỬA</a>
                                    <button class="btn btn-danger btndelete" data-idxoa=<?php echo $hsp['hsp_ma']; ?>>XÓA</button></td>         
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
    <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>
    <script src="/project-web/assets/vendor/DataTables/datatables.min.js"></script>
    <script src="/project-web/assets/vendor/DataTables/Buttons-1.6.3/js/buttons.bootstrap4.min.js"></script>
    <script src="/project-web/assets/vendor/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="/project-web/assets/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#id_danhsach').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ]
            });
            $('.btndelete').click(function() {
                swal({
                        title: "Bạn có chắn chắn xóa không?",
                        text: "Không thể phục hồi dữ liệu khi xóa!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var sp_ma = $(this).data('idxoa');
                            var url = 'delete.php?idxoa=' + sp_ma;
                            location.href = url;
                        } else {
                            swal("Hủy xóa thành công!");
                        }
                    });
            });

        });
    </script>

</body>

</html>