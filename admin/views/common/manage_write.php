<!-- quản lý bài viết -->
<div class="col-md-10 content " id="posts">
        <section class="content-header">

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
</section>
<div class="example">
    <div class="container">
        <div class="row ckeditor">
            <h2>Thêm bài viết</h2>
                <form>
                    <span>Danh mục</span>
                    <select name="tags" id="tags">
                        <option value="news">Tin tức</option>
                        <option value="notice">Thông báo</option>
                        <option value="lifeStory">Chuyện đời IT</option>
                        <option value="meeting">Lịch họp CLB</option>
                        <option value="product">Sản phẩm</option>
                        <option value="course">Khóa học</option>
                        <option value="project">Dự án</option>
                    </select>
                    <br>
                    <p>Tiêu đề</p>
                    <input type="text" name="title" id="title_News">
                    <p>Ảnh bài viết</p>
                    <input type="file" id="img" name="img">
                    <p>Tóm tắt</p>
                    <textarea cols="60" rows="5" name="description" id="description_News"></textarea>
                    <p>Nội dung</p>
                    <textarea id="editor" cols="30" rows="10" name="content"></textarea>
                    <script>
                        var editor = CKEDITOR.replace('editor');
                    </script>
                    <br>
                    <input type="submit" class="btn btn-primary" name="submit"></input>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            for ( instance in CKEDITOR.instances )
                CKEDITOR.instances[instance].updateElement();
            $('form').submit(function(e) {
                e.preventDefault();
                var title = $('#title_News').val(),
                description = $('#description_News').val(),
                content = CKEDITOR.instances.editor.getData(),
                tags = $('#tags').val();
                var image = $('#img').attr("name");
                var form = document.querySelector('form');
                var method = 'create';
                var formData = new FormData(form);
            // var data = encodeURIComponent(content);
            var request = new XMLHttpRequest();
            formData.append('method',method);
            formData.append('content', content);
            formData.append('img',image)
            if ($.trim(title) == '') {
                alert('Bạn chưa nhập tiêu đề');
                return false;
            }
            if ($.trim(description) == '') {
                alert('Bạn chưa nhập mô tả');
                return false;
            }
            //  alert(content);
            if ($.trim(content) == '') {
                alert('Bạn chưa nhập nội dung');
                return false;
            }
            if ($.trim(tags) == '') {
                alert('Bạn chưa nhập danh mục');
                return false;
            }
            request.open('post','Post.php',true);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    alert(request.responseText);
              }
          };
          request.send(formData);
            return false;
        });
        });
    </script>
    </div>
