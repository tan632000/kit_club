
<div class="col-md-10 content" >
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

<h2>Danh sách thành viên</h2>
<!-- <base href="admin.php?url=member/search"> -->
<div class="col-md-3"><div class="row">
<form action="" type="get" >
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="search_user">
  </div>
</form>
</div></div>
<!-- /.col-lg-12 -->
    <table class="table table-bordered">
    <thead>
        <tr align="center">
        
            <th >STT</th>
            <th>Ảnh đại diện</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Lớp</th>
            <th>Họ và tên</th>
            
            <th>Tùy chọn</th>
            <th>Quyền</th>

     
        </tr>
    </thead>
    <tbody>

        <?php 
        if(count($member)>0){

        $stt = 0;
        
            foreach($member as $item){
            $stt++ ?>
        <tr class="table-content" align="center">

        <td><?php echo $stt;?></td>

            <td><img src="public/img/<?=$item['avatar']?>" width="55" height="55" alt=""></td>
            <td><?php echo $item['username'] ?></td>            
            <td><?php echo $item['email'] ?></td>
            <td><?php echo $item['phone'] ?></td>
            <td><?php echo $item['class'] ?></td>
            <td><?php echo $item['fullname'] ?></td>
            
             

            <td>
                <a  href="/kit_club/admin.php?url=member/edit/<?php echo $item['id'];?>" >Sửa</a>
                <a onclick="return confirm('Bạn có muốn xóa không?')" href="/kit_club/admin.php?url=member/delete/<?=$item['id'];?>">Xóa</a>

            </td>
            <td>
                <a  href="/kit_club/admin.php?url=member/editGr/<?php echo $item['id'];?>" >Sửa</a>
                

            </td>



            
            <!-- <td class="center"><a style="color:blue" href="admin.php/member/edit/<?php echo $item['id'] ?>">Edit</a></td> -->
        </tr>
    <?php } ?>

    </tbody>
</table>
<div class="clear"></div>
                <div class="page-order text-center" >
                        <ul class="pagination">
                        <li><a href="#" class="wow bounceInRight" data-wow-delay="0.3s">&raquo;</a></li>
                        <?php
                        for($i=1; $i<=$sumpage ;$i++){
                            ?><li><a href="admin.php?url=member/listAll/<?=$i?>" class="wow bounceInLeft"data-wow-delay="0.3s" title="Trang '.$i.'"><?=$i?></a></li>
                         <?php
                        }?>
                        <li><a href="#" class="wow bounceInRight" data-wow-delay="0.3s">&raquo;</a></li>
                        </ul>
                </div>

<?php } else{ echo "<div class='col-md-12'><div class='row'><p>Not found.</p></div></div>"; } ?>
<?php


?>




