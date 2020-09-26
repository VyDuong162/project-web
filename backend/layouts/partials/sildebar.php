<nav class="col-md-2 d-none d-md-block sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <!-- #################### Menu các trang Quản lý #################### -->
      <li class="nav-item sidebar-heading"><span>Quản lý</span></li>
      <li class="nav-item">
        <a href="/backend/pages/dashboard1.php">Bảng tin <span class="sr-only">(current)</span></a>
      </li>
      <hr style="border: 1px solid red; width: 80%;" />
      <!-- #################### End Menu các trang Quản lý #################### -->
      <!-- #################### Menu chức năng Danh mục #################### -->
      <li class="nav-item sidebar-heading">
        <span>Danh mục</span>
      </li>
      <!-- Menu Chuyên mục sản phẩm -->
      <li class="nav-item">
        <a href="#shop_SubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          Chuyên mục sản phẩm
        </a>
        <ul class="collapse" id="shop_SubMenu">
          <li class="nav-item">
            <a href="/backend/functions/sanpham/index.php">Danh sách</a>
          </li>
          <li class="nav-item">
            <a href="/backend/functions/sanpham/create.php">Thêm mới</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#hinhthucsanpham" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          Hình thức thanh toán
        </a>
        <ul class="collapse" id="shop_SubMenu">
          <li class="nav-item">
            <a href="/backend/functions/hinhthucthanhtoan/index.php">Danh sách</a>
          </li>
          <li class="nav-item">
            <a href="/backend/functions/hinhthucthanhtoan/create.php">Thêm mới</a>
          </li>
        </ul>
      </li>
      <!-- End Menu Chuyên mục sản phẩm -->
      <!-- #################### End Menu chức năng Danh mục #################### -->
    </ul>
  </div>
</nav>