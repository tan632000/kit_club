<div class="col-md-10 content"  style="overflow: auto">
<h1>
                Quản lý
                <small>Control panel</small>
            </h1>
            <div class="breadcrumb">
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a>
                </li>
                <li class="active">Quản lí thành viên</li>
            </div>
<h2 >Chỉnh sửa thành viên</h2>

<div class="content-section" style="padding-bottom:120px">
  <form action="admin.php?url=member/postEdit/<?=$id?>" method="POST" enctype="multipart/form-data" >
 
  <div class="form-group">
					<td><input type="text" name="fullname" placeholder="Họ và tên" value="<?php echo $user['fullname']?>" class="form-control"></td>
					</div>
					<div class="form-group">
					<td><input type="text" name="username" placeholder="Tên đăng nhập" value="<?php echo $user['username']?>" class="form-control"></td>
					</div>
					<div class="form-group">
					<td><input type="text" name=password value="" placeholder="Mật khẩu" class="form-control"></td>
					</div>
					<div class="form-group">
					<td><input type="text" name="email" placeholder="Email"  value="<?php echo $user['email']?>" class="form-control" ></td>
					
					</div>
					<div class="form-group">
					<td><input type="text" name="phone" placeholder="Số điện thoại" value="<?php echo $user['phone']?>" class="form-control"></td>
					
					</div>
					<div class="form-group">
					<td><input type="text" name="class" placeholder="Lớp" value="<?php echo $user['class']?>" class="form-control"></td>
					
					</div>
					<div class="form-group">
					<td><input type="text" name="role" placeholder="Vai trò" value="<?php echo $user['role']?>" class="form-control"></td>
					
					</div>
					<div class="form-group">
					<td><input type="file" name="avatar" value="<?php echo $user['avatar']?>" class="form-control" ></td>
					
					</div>
					
					
					
					<div class="form-group">
					
					<td>Ngày sinh</td>
							<td>
								<select name="day">
									<option value="ngay">Ngày</option>
									<?php 
										for($i=1;$i<=31;$i++){
											echo "<option value='$i'>$i</option>";
										}
									?>
								</select>
								<select name="month">
									<option value="thang">Tháng</option>
									<?php
										$thang = array(1=>"Jan","Feb","March","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
										
									foreach( $thang as $key=>$tam) {
										echo "<option value='$key'>$tam</option>";
									}
									?>
								</select>
								<select name="year">
									<option value="nam">Năm</option>
									<?php 
										for($j=1995;$j<=date("Y");$j++){
											echo "<option value='$j'>$j</option>";
										}
									?>
								</select>
							</td>
					</div>

					<div class="form-group">
					<td>Giới</td>
							<td>
								<input type="radio" name="gender" value="1"/>Nam
								<input type="radio" name="gender" value="2"/>Nữ
							</td>
					
					</div>
    <button type="submit" class="btn btn-success" name="post_edit">Lưu</button>


</form>
</div>

</div>