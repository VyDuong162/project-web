<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <h1>Form Tìm Kiếm</h1>
  <form name="frm-timkiem" id="frm-timkiem" action="xuly-timkiem.php" method="GET">
  <h2><b>Tên sản phẩm</b> </h2>
  <input type="text" name="txttimkiem" id="txttimkiem"><br>
  <h3>Loại sản phẩm</h3><br>
  <input type="checkbox" name="chkbloaisanpham[]" id="chkbloaisanpham-1" value="1">Máy Tính bảng <br>
  <input type="checkbox" name="chkbloaisanpham[]" id="chkbloaisanpham-2" value="2">Máy tính xách tay <br>
  <input type="checkbox" name="chkbloaisanpham[]" id="chkbloaisanpham-3" value="3">Điên Thoại <br>
  <input type="checkbox" name="chkbloaisanpham[]" id="chkbloaisanpham-4" value="4">Phụ kiện <br>
  <h3>Nhà sản xuất</h3><br>
  <input type="checkbox" name="chkbnhasanxuat[]" id="chkbnhasanxuat-1" value="1">Apple <br>
  <input type="checkbox" name="chkbnhasanxuat[]" id="chkbnhasanxuat-2" value="2">Samsung  <br>
  <input type="checkbox" name="chkbnhasanxuat[]" id="chkbnhasanxuat-3" value="3">HTC<br>
  <input type="checkbox" name="chkbnhasanxuat[]" id="chkbnhasanxuat-4" value="4">Nokia<br>
  <h3>Khuyến mãi</h3><br>
  <input type="radio" name="rdkhuyenmai" id="rdkhuyenmai" value="0">20% <br>
  <input type="radio" name="rdkhuyenmai" id="rdkhuyenmai" value="1">50% <br>
  <br>
  <input type="submit" name="subgui" id="subgui" value="Gửi Thông Tin">
  </form>
</body>
</html>