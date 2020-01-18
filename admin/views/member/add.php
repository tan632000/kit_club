

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
<ul class="nav nav-tabs">
     <li><a href="/kit_club/admin.php?url=member/add" >Thêm thành viên <span class=""></span></a></li>
    <li><a href="/kit_club/admin.php?url=member/listAll" >Danh sách thành viên <span class=""></span></a>
    </li>
</ul>
<h3> Thêm thành viên</h3>


<div class="content-section" >
  <form action="" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
					<td><input type="text" name="fullname" placeholder=" Họ và tên" class="form-control"></td>
					</div>
					<div class="form-group">
					<td><input type="text" name="username" placeholder=" Tên đăng nhập" class="form-control"></td>
					</div>
					<div class="form-group">
					<td><input type="text" name=password placeholder=" Mật khẩu" class="form-control"></td>
					</div>
					<div class="form-group">
					<td><input type="text" name="email" placeholder=" Email" class="form-control"></td>
					
					</div>
					<div class="form-group">
					<td><input type="text" name="phone" placeholder=" Số điện thoại" class="form-control"></td>
					
					</div>
					<div class="form-group">
					<td><input type="text" name="class" placeholder=" Lớp" class="form-control"></td>
					
					</div>
					<div class="form-group">
					<td>
					
								<select type="text" name="role"  class="form-control" placeholder=" class"  name="role">
								<option selected disabled >Choose Role</option>";
									<option value='1'>Ban nhân sự</option>";
									<option value='2'>Ban truyền thông</option>";
									<option value='3'>Ban sự kiện</option>";
									<option value='4'>Ban hậu cần</option>";
									<option value='5'>Ad truyền thông</option>";
									<option value='6'>admin</option>";
									
									
								</select>
					</td>
					
					</div>
					<div class="form-group">
					<td><input type="file" name="avatar" class="form-control" ></td>
					
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
					<td>Giới tính</td>
							<td>
								<input type="radio" name="gender" value="1"/>Nam
								<input type="radio" name="gender" value="2"/>Nữ
							</td>
					
					</div>
    		<button type="submit" class="btn btn-success" name="add">Thêm</button>
</form>

</div>
</div>




