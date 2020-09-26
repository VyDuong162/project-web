<?php
  if (session_id() === '') {
    // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}
?>
<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">Nền tảng</a>
  <ul class="navbar-nav px-3 mr-auto">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="/project-web/backend/pages/dashboard1.php">Trang chủ</a>
    </li>
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="/project-web/backend/pages/dashboard1.php">Quản trị</a>
    </li>
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="/project-web/backend/pages/dashboard1.php">Sản phẩm</a>
    </li>
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="/project-web/backend/pages/dashboard1.php">Giới thiệu</a>
    </li>
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="/project-web/backend/pages/dashboard1.php">Liên hệ</a>
    </li>
      <?php
      // Đã đăng nhập rồi -> hiển thị tên Người dùng và menu Đăng xuất
      if (isset($_SESSION['kh_tendangnhap_logged']) && !empty($_SESSION['kh_tendangnhap_logged'])) :
      ?>
        <li class="nav-item text-nowrap">
          <a class="nav-link">Chào <?= $_SESSION['kh_tendangnhap_logged']; ?></a>
        </li>
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="/project-web/backend/auth/logout.php">Đăng xuất</a>
        </li>
      <?php else : ?>
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="/project-web/backend/auth/login.php">Đăng nhập</a>
        </li>
      <?php endif; ?>
    </ul>
</nav>