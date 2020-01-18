
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
<h3>Thêm bài viết</h3>

<div class="content-section" style="padding-bottom:120px">
    <form action="/kit_club/admin.php?url=news/postAdd" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>Tiêu đề</label>
            <input class="form-control" name="txtName" placeholder="Tiêu đề">
        </div>
        <div class="form-group">
            <label>Nội dung</label>
            <textarea class="form-control ckeditor" rows="5" name="txtContent" id="demo"></textarea>
        </div>
        <div class="form-group">
            <label>Ảnh bài viết</label>
            <input type="file" name="image" class="form-control"/>
        </div>
        
        <button type="submit" name="add_news" class="btn btn-success">Thêm</button>
    
    </form>
</div>

</div>

