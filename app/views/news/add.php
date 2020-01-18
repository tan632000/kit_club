
<head>
    <?php
       require('admin/views/common/head.php');
    ?>
     
</head> 
<header class="main-header">
        <div class="name-clb">
            
            <span class="name"><img src="app/views/user/img./logo.jpg"><b>KIT </b>CLUB</span>
        </div>

</header>
<div class="col-md-2" id="menuLeft" style="overflow: auto">
        
        <div class="user-panel">
        <div class="pull-left img">
            
            <img src="public/img/<?=$_SESSION['user']['avatar']?>" class="img-sidebar" alt="user image">
        </div>
        <div class="pull-left info">
            <p><?=$_SESSION['user']['username']?></p>
            <a href="#"><i class="fa fa-circle "> member</i></a>
        </div>
    </div>
    <!-- sidebar menu: -->
    <ul class="sidebar-menu">
        <li class="header">Member Temp</li>
        <li class="item-menu-dashboard">
            <a href="#" onclick="opentabs('dashBoard')">
                <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
            </a>
        </li>
    
        <li class="item-menu-products">
            <a href="#" onclick="opentabs('account')">
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

        <div class="col-md-10 content" id="dashBoard">
        <script type="text/javascript">
            $('#dashBoard').load('app/views/user/dashBoard.html');
        </script>
    </div>

    <!--Cai dat tai khoan-->
    <div class="col-md-10 content " id="account">
        <script type="text/javascript">
            $('#account').load('app/views/user/account.php');
        </script>
    </div>

    <!-- Thông báo -->
    <div class="col-md-10 content" id="notify">
        <script type="text/javascript">
            $('#notify').load('app/views/user/notify.html');
        </script>
    </div>


    
    <!-- Dự án -->
    <div class="col-md-10 content " id="project">
       <script type="text/javascript">
            $('#project').load('app/views/user/project.html');
        </script>
    </div>

    

    <!-- show and hide menu -->
    <div class="icon-content">
        <i class="fas fa-align-justify" onclick="show()"></i>
    </div>
    <div class="icon-content-back">
        <i class="fas fa-times-circle" onclick="hide()"></i>
    </div>





<div class="col-md-10 content"  style="overflow: auto">
<h2>News Add</h2>


<div class="content-section" style="padding-bottom:120px">
    <form action="/kit_club/index.php?url=news/postAdd" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>Post Name</label>
            <input class="form-control" name="txtName" placeholder="Name News">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control ckeditor" rows="5" name="txtContent" id="demo"></textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control"/>
        </div>
        
        <button type="submit" name="add_news" class="btn btn-default">Add</button>
    
    </form>
</div>

</div>

