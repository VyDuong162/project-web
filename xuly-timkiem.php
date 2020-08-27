<?php
 if(isset($_GET['subgui'])){
 if(isset($_GET['txttimkiem'])){
      $ten_sanpham=$_GET['txttimkiem'];
 }
$loaisanpham=[];
 if(isset($_GET['chkbloaisanpham'])){
      $loaisanpham=$_GET['chkbloaisanpham'];
 }
 $nhasanxuat=[];
 if(isset($_GET['chkbnhasanxuat'])){
      $nhasanxuat=$_GET['chkbnhasanxuat'];
 }
 
 $khuyenmai=null;
 if(isset($_GET['rdkhuyenmai'])){
      $khuyenmai=$_GET['rdkhuyenmai'];
 }
 echo "<ul>";
 echo "<li>Từ khóa tìm kiếm: <b>{$ten_sanpham}</b></li>";
 if(!empty($loaisanpham)){
      $loaisanpham_string=implode(',',$loaisanpham);
      echo "<li>Các loại sản phẩm tìm kiếm: <b>{$loaisanpham_string}</b></li>";
 }
 if(!empty($nhasanxuat)){
      $nhasanxuat_string=implode(',',$nhasanxuat);
      echo "<li>Các Nhà sản xuất tìm kiếm: <b>{$nhasanxuat_string}</b></li>";
 }
      echo "<li>Khuyến mãi:<b>{$khuyenmai}</b></li>";
 echo "</ul>";
}
?>