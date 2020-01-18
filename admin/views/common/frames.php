<div id="frames" style="overflow: auto">
    <header class="main-header">
        <div class="name-clb">
            <span class="name"><img src="public_admin/img./logo.jpg"><b>KIT </b>CLUB</span>
        </div>

    </header>
    <div class="col-md-2">
        <div class="user-panel">
            <div class="pull-left img">
                <img src="public_admin/img./user.jpg" class="img-sidebar" alt="user image">
            </div>
            <div class="pull-left info">
                <p>BOSS Admin</p>
                <a href="#"><i class="fa fa-circle "> admin</i></a>
            </div>
        </div>
        <!-- sidebar menu:-->
        <ul class="sidebar-menu">
            <li class="header">Admin Temp</li>
            <li class="item-menu-dashboard background">
                <a href="/kit_club/admin.php?url=home/index" >
                    <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="item-menu-products">
                <a href="#Quan-li-thanh-vien"onclick="opentabs('admin')" >
                
                    <i class="fa fa-address-book"></i>
                    <span>Quản lí thành viên</span>
                </a>
            </li>
            <li class="item-menu-products">
                <a href="#taikhoan" onclick="opentabs('account')">
                    <i class="fas fa-user-edit"></i>
                    <span>Tài khoản</span>
                </a>
            </li>
            <li class="item-menu-products">
                <a href="/kit_club/index.php?url=user/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Đăng xuất</span>
                </a>
            </li>
          
        </ul>

    </div>

    <!-- quản lý Tài khoản -->
    <?php
    require_once('admin/views/common/manage_account.php');
    ?>
     <?php
    require_once('admin/views/common/manage_member.php');
    ?>
 </div>