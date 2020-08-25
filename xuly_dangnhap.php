<?php
   // if(isset($_GET['btn_dangnhap'])){
    $ten_dangnhap = $_GET['txt_username'];
    $matkhau = $_GET['txt_password'];
    if( $ten_dangnhap == 'admin' && $matkhau == '123456' ){
        echo "Chào bạn <span style='color:blue'>{$ten_dangnhap}</span> đến với website...";
    }
    else{
        echo "Đăng nhập thất bại!";
    }
    //}
?>