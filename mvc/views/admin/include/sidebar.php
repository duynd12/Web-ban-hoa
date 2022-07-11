
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">
                  <li><a href="http://localhost/demo/"><i class="fa fa-users"></i>Trang Sản Phẩm</a></li>
                  <li><a href="<?=base?>admin/home"><i class="fa fa-dashboard"></i> Thống Kê</a>
                  </li>
                  <li><a href="<?=base?>admin/useraccount"><i class="fa fa-users"></i>Quản Lí Khách Hàng</a></li>
                  <li><a href="<?=base?>admin/order"><i class="fa fa-shopping-cart"></i>Quản Lí Đơn Hàng</a></li>
                  <li><a href="<?=base."admin/showcategory"?>"><i class="fa fa-list"></i>Quản Lí Danh Mục</a></li>
                  <li><a href="<?=base."admin/showproduct"?>"><i class="fa fa-archive"></i>Quản Lí Sản Phẩm</a></li>
                  
                  <li><a href="admin/ChangePass"><i class="fa fa-cog"></i>Đổi Mật Khẩu</a></li>
                  <li><a onclick="logout('<?=base.'home/index'?>')" class="dropdown-item" href="javascript:void(0)"><i class="fa fa-sign-out pull-left"></i>Đăng Xuất</a></li>
                </ul>
              </div>
            </div>