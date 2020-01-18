<div class="col-md-10 content" id="login_schedule_admin">
  <script type="text/javascript">
    $(document).ready(()=>{
      $('#submit_login_schedule').unbind().bind('click' , login);
    });
    
    function login(){
      $("#idForm_login_schedule").submit(function(e) {
        e.preventDefault(); 
        var form = $(this);
        let username = $('#username_login_schesule').val();
        let password = $('#password_login_schedule').val();
        let id = '<?php echo $_SESSION['user']['id'];?>';
        $.ajax({
           type: "POST",
           //url: "./app/models/login.php",
           url: "./calender/action/load_data.php",
           data: {username : username , password : password , check : '1' , id :id}, // serializes the form's elements.
           success: function(result){
              if(result == '1'){ 
                window.location = "/kit_club/admin.php?url=home/index";
              }
              else{
                let content_error = document.getElementById('content_error');
                content_error.innerHTML = result;
                content_error.style.display = 'block';
              }
           }
        });
      }); 
    }
</script>
     <div class="form_content" align="center">
            <h2>Xem thời khóa biểu sinh viên</h2>
            <h1 id="kitclub">CLB KIT !</h1>

        </div>
    <form id="idForm_login_schedule" style="margin: 0 auto ; width: 60%;">
      <div class="form-group">
        <label >Tài khoản trường</label>
        <input type="text" class="form-control" aria-describedby="emailHelp"  name="username" id="username_login_schesule" required="" placeholder="Tài khoản">
        
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" id="password_login_schedule" required="" placeholder="Mật khẩu">
      </div>
      <input type="submit" name="submit" id="submit_login_schedule" class="btn btn-primary" value="Đăng nhập">
       <div id="content_error" class="alert alert-danger" style="display: none; margin-top: 20px;"></div>
    </form>
</div>
