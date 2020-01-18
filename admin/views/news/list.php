
<div class="col-md-10 content"  style="overflow: auto">
<h1>
        Quản lý
        <small>Control panel</small>
    </h1>
    <div class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a>
        </li>
        <li class="active">Dashboard</li>
        <li class="active">Bài viết</li>
    </div>
<h3>Danh sách bài viết</h3>
<div class="col-md-3"><div class="row">
<form action="admin.php/news/search/" type="GET">
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="s">
  </div>
</form>
</div></div>

<!-- /.col-lg-12 -->
    <table class="table table-bordered ">
        <thead>
            <tr align="center">
                <th>Stt</th>
                <th>Ảnh</th>
               
                <th>Tiêu đề</th>
              
                <th>Nội dung</th>
                <th>Người đăng</th>
                <th>Ngày đăng</th>
                <th>Xóa</th>
                <th>Sửa</th>
                <th>Xem</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(count($news)>0){

        $stt=0;
            foreach($news as $item){
            $stt++; ?>
            <tr class="table-content" align="center">
                <td><?php echo $stt; ?></td>
                <td><img style="width: 120px;" src="public/img_news/<?php echo $item['images'] ?>" /></td>
               
                <td><?php echo $item['title'] ?></td>
                <td class="content_post" ><?php echo $item['content'] ?></td>
                <td><?php echo $item['author']?></td>
                <td><?php echo $item['createdate'] ?></td>
                <td class="center"><a style="color:red" onclick="return confirm('Delete News?');" href="admin.php?url=news/delete/<?php echo $item['id'] ?>"> Xóa</a></td>
                <td class="center"><a style="color:blue" href="admin.php?url=news/edit/<?php echo $item['id'] ?>">Sửa</a></td>
                <td class="center"><a href="news/view/<?php echo $item['id'] ?>" target="_blank" style="color:green">Xem</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

     <div class="pagination_admin" style="clear:both">
                        <ul class="pagination" >
                    
                        <?php
                        for($i=1; $i<=$sumpage ;$i++){
                            ?><li><a href="admin.php?url=news/list_all/<?=$i?>" title="Trang '.$i.'"><?=$i?></a></li>
                         <?php
                        }?>
                   
                        </ul>
                    </div>

<?php } else{ echo "<div class='col-md-12'><div class='row'><p>Not found.</p></div></div>"; } ?>

</div>
