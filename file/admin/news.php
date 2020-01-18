        
<section class="content-header" >
    <h1>
        Quản lý
        <small>Control panel</small>
    </h1>
    <div class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a>
        </li>
        <li class="active">Dashboard</li>
        <li class="active">Tin tức</li>
    </div>
</section>
<div class="example" id="scroll" >
    <div class="container">
        <div class="row">
            <h1>Danh sách tin tức</h1>
            <table class="table table-striped table-bordered" style= " width: 90%; table-layout: fixed;">
                <thead>
                    <tr>
                        <th>Ảnh bài viết</th>
                        <th>Tiêu đề</th>
                        <th>Tóm tắt</th>
                        <th>Nội dung</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <tbody id="data">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- phan trang -->
<script type="text/javascript">
    pagination();
    newsAction();
    // modalShowNews();
</script>
