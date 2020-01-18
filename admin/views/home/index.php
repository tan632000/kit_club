
<div class="col-md-10 content" style="overflow: auto;" >
        <section class="content-header">

            <h1>
                Quản lý
                <small>Control panel</small>
            </h1>
            <div class="breadcrumb">
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a>
                </li>
                <li class="active">Dashboard</li>
            </div>
        </section>
        <div class="example">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="/kit_club/admin.php?url=news/postAdd" class="thumbnail" onclick="opentabs('posts')">
                            <img src="public_admin/img./baiviet.png" alt="125x125">
                            <div class="txt">
                                <h3>Xem chi tiết</h3>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-3">
                        <a href="/kit_club/admin.php?url=news/listAll" class="thumbnail" >
                            <img src="public_admin/img./tintuc.png" alt="125x125">
                            <div class="txt">
                                <h3>Xem chi tiết</h3>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-3">
                        <a href="#" class="thumbnail" onclick="opentabs('thong_bao')">
                            <img src="public_admin/img./thongbao.png" alt="125x125">
                            <div class="txt">
                                <h3>Xem chi tiết</h3>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-3">
                        <a href="#" class="thumbnail" onclick="opentabs('view_schedule_admin')">
                            <img src="public_admin/img./chuyendoi.png" alt="125x125">
                            <div class="txt">
                                <h3>Xem chi tiết</h3>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-3">
                        <a href="#" class="thumbnail" onclick="opentabs('lich_hop')">
                            <img src="public_admin/img./lichhop.png" alt="125x125">
                            <div class="txt">
                                <h3>Xem chi tiết</h3>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-3">
                        <a href="#" class="thumbnail" onclick="opentabs('san_pham')">
                            <img src="public_admin/img./sanpham.png" alt="125x125">
                            <div class="txt">
                                <h3>Xem chi tiết</h3>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-3">
                        <a href="#" class="thumbnail" onclick="opentabs('khoa_hoc')">
                            <img src="public_admin/img./khoahoc.png" alt="125x125">
                            <div class="txt">
                                <h3>Xem chi tiết</h3>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-3">
                        <a href="#" class="thumbnail" onclick="opentabs('du_an')">
                            <img src="public_admin/img./duan.png" alt="125x125">
                            <div class="txt">
                                <h3>Xem chi tiết</h3>
                            </div>
                        </a>

                    </div>

                </div>
            </div>

        </div>

    </div>
<!-- quản lý Tin tức -->

    <!-- quản lí bài viết -->
    <?php
       require('admin/views/common/manage_write.php');
    ?>  
    <!-- quản lí tin tức -->
    <?php
       require('admin/views/common/manage_news.php');
    ?>

    <!-- quản lí thông báo -->
    <?php
       require('admin/views/common/manage_notify.php');
    ?>
    <!-- quản lí công nghệ -->
    <?php
       require('admin/views/common/manage_techNews.php');
    ?>

    <!-- quản lý Lịch họp CLB -->
    <?php
       require('admin/views/common/manage_meeting.php');
    ?>
    <!-- quản lý Sản phẩm -->
    
    <?php
       require('admin/views/common/manage_product.php');
    ?>
    <!-- quản lý Khóa học -->
    <?php
       require('admin/views/common/manage_course.php');
    ?>

    <!-- quản lý dự án -->
    <?php
       require('admin/views/common/manage_project.php');
    ?>

    <?php
       require('admin/views/common/login_schedule_admin.php');
    ?>

    <?php
       require('admin/views/common/view_schedule_admin.php');
    ?>

    <div class="icon-content">
        <i class="fas fa-align-justify" onclick="show()"></i>
    </div>
    <div class="icon-content-back">
        <i class="fas fa-times-circle" onclick="hide()"></i>
    </div>
    