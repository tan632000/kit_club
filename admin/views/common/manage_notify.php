<!-- quản lý Thông báo -->
<div class="col-md-10 content " id="thong_bao">
    <section class="content-header">

    <h1>
        Quản lý
        <small>Control panel</small>
    </h1>
    <div class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a>
        </li>
        <li class="active">Dashboard</li>
        <li class="active">Thông báo</li>
    </div>
</section>
<div class="example">

    <div class="container">
    
        <div class="row">
        
            <ul class="nav nav-tabs">
            
                <li><a href="#notification-post" data-toggle="tab">Đăng thông báo CLB</a></li>
            
                <li><a href="#notification-email" data-toggle="tab">Gửi thông báo qua Email</a></li>
                </ul>
        
            <div class="tab-content">
            
                <div class="tab-pane" id="notification-post">
                    <h1>Thông báo</h1>

                    <p>Ảnh</p>
                    <input type="file" name="img">
                    <p>Tiêu đề</p>
                    <input type="title" name="title">
                    <p>Nội dung</p>
                    <textarea id="editor1" cols="30" rows="10"></textarea>
                    <script>
                        var editor1 = CKEDITOR.replace('editor1');
                    </script>
                    
                        <button type="button" class="btn btn-primary">Đăng thông báo</button>
                
                </div>
            
                <div class="tab-pane" id="notification-email">
                    <!-- <div id="loading-mail" ><img src="loading.gif" alt="Loading"></div> -->
                    <h1>Gửi Email thông báo</h1>
                    <p>Nhập email của các thành viên cần gửi thông báo: </p>
                    <form id="form-Mails">
                        <textarea id="listMail" cols="30" rows="10"></textarea>
                        <p>Tiêu đề</p>
                        <input id="mail-title" type="text" name="title-listMails">
                        <p>Nội dung</p>
                        <textarea id="editor2" cols="30" rows="10"></textarea>
                        <script>
                            var editor2 = CKEDITOR.replace('editor2');
                        </script>
                        <button type="submit" class="btn btn-primary">Gửi thông báo</button>
                    </form>

                </div>

                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    notificationMail();
</script>
</div>