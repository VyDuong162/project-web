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
  <form name="frm-timkiem" id="frm-timkiem" action="xuly-timkiem.php" method="get">
  <h2><b>Tên sản phẩm</b> </h2>
  <input type="text" name="txttimkiem" id="txttimkiem"><br>
  <h2>Loại sản phẩm</h2><br>
  <input type="checkbox" name="chkbloaisanpham[]" id="chkbloaisanpham-0" value="0">Máy Tính bảng <br>
  <input type="checkbox" name="chkbloaisanpham[]" id="chkbloaisanpham-1" value="1">Máy tính xách tay <br>
  <input type="checkbox" name="chkbloaisanpham[]" id="chkbloaisanpham-2" value="2">Điên Thoại <br>
  <input type="checkbox" name="chkbloaisanpham[]" id="chkbloaisanpham-3" value="3">Phụ kiện <br>
  <h2>Nhà sản xuất</h2><br>
  <input type="checkbox" name="chkbnhasanxuat[]" id="chkbnhasanxuat-0" value="0">Apple <br>
  <input type="checkbox" name="chkbnhasanxuat[]" id="chkbnhasanxuat-1" value="1">Samsung  <br>
  <input type="checkbox" name="chkbnhasanxuat[]" id="chkbnhasanxuat-2" value="2">HTC<br>
  <input type="checkbox" name="chkbnhasanxuat[]" id="chkbnhasanxuat-3" value="3">Nokia<br>
  <h2>Khuyến mãi</h2><br>
  <input type="radio" name="rdkhuyenmai" id="rdkhuyenmai" value="0">20% <br>
  <input type="radio" name="rdkhuyenmai" id="rdkhuyenmai" value="1">50% <br>
  <br>
  <input type="submit" name="subgui" id="subgui" value="Gửi Thông Tin">
  </form>
</body>
</html>