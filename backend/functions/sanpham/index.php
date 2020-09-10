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
                <h1>Danh sách sản phẩm</h1>
                <?php
                    include_once(__DIR__ . '/../../../dbconnect.php');
                    // 2. Query
                    //here doc
                    $sql = <<<EOT
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
                    $result = mysqli_query($conn, $sql);
                    //4. tạo mảng chứa dữ liệu
                    $data = [];
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $km_tomtat = '';

                        if (!empty($row['km_ten'])) {
                            $km_tomtat = sprintf(
                                "Khuyến mãi:%s, Nội dung:%s Từ: %s đến %s",
                                $row['km_ten'],
                                $row['kh_noidung'],
                                date('d/m/Y', strtotime($row['kh_tungay'])),
                                date('d/m/Y', strtotime($row['km_denngay']))
                            );
                        }
                        $data[] = array(
                            'sp_ma' => $row['sp_ma'],
                            'sp_ten' => $row['sp_ten'],
                            'sp_gia' => number_format($row['sp_gia'], 0, ".", ",") . 'VND',
                            'lsp_ten' => $row['lsp_ten'],
                            'nsx_ten' => $row['nsx_ten'],
                            'km_tomtat' => $km_tomtat
                        );
                    }
                ?>
                <a href="create.php"><button type="button" class="btn btn-primary">Thêm mới</button></a> <br><br>

                <table id="id_danhsach" class="table mx-auto table-bordered ">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Nhà sản xuất</th>
                            <th>Khuyến mãi</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $sp) : ?>
                            <tr>
                                <td><?= $sp['sp_ma']; ?></td>
                                <td><?= $sp['sp_ten']; ?></td>
                                <td><?= $sp['sp_gia']; ?></td>
                                <td><?= $sp['lsp_ten']; ?></td>
                                <td><?= $sp['nsx_ten']; ?></td>
                                <td><?= $sp['km_tomtat']; ?></td>
                                <td><a href="edit.php?idupdate=<?php echo $sp['sp_ma']; ?>" class=" btn btn-success"> SỬA</a>
                                    <button class="btn btn-danger btndelete" data-idxoa=<?php echo $sp['sp_ma']; ?>>XÓA</button>
                                </td>   
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