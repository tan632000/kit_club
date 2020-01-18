<?php
    session_start();
?>
<section class="content-header">
    <h1>
        Quản lý
        <small>Control panel</small>
    </h1>
    <div class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a>
        </li>
        <li class="active">Tài khoản</li>
    </div>
</section>


<div class="example">
    <div class="container">
        <div class="row account">
            <h1>Cài đặt tài khoản</h1>
            <form action="/kit_club/index.php?url=user/update_info" method="POST" enctype="multipart/form-data"> 
                          <div class="form-group" >
                            <label for="exampleInput">Tên Đăng Nhập</label>
                            <input name="username"type="text" class="form-control" id="exampleInput"  placeholder="username" value="<?php echo $_SESSION['user']['username']; ?>">
                            
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword">Mật Khẩu</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Password" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInput">Tên Đầy Đủ</label>
                            <input name="fullname"type="text" class="form-control" id="exampleInput"  placeholder="full name" value="<?php echo $_SESSION['user']['fullname']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInput">email</label>
                            <input name="email" type="email" class="form-control" id="exampleInput"  placeholder="email" value="<?php echo $_SESSION['user']['email']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInput">number phone</label>
                            <input name="phone"type="text" class="form-control" id="exampleInput"  placeholder="number phone" value="<?php echo $_SESSION['user']['phone']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInput">tài khoản trường</label>
                            <input name="student_id" class="form-control" id="exampleInput"  placeholder="student_id" value="<?php echo $_SESSION['user']['student_id']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControl">avata</label>
                            <input name ="avatar" type="file" class="form-control-file" id="exampleFormControl" value="<?php echo $_SESSION['user']['avata']; ?>">
                          </div>
                          
                          <button type="submit" class="btn btn-primary" name="updateUser">Lưu thay đổi</button>
                        </form>
        </div>
    </div>
</div>