
 <script type="text/javascript">
   

    $(document).ready(()=>{
      $('#submit_schedule_member').unbind().bind('click' , login);
    });
    
    function login(){
      $("#idForm_schedule_member").submit(function(e) {
        e.preventDefault(); 
        var form = $(this);
        let username = $('#username_schesule_member').val();
        let password = $('#password_schedule_member').val();
        let id = "<?php echo  $_SESSION['user']['id'];?>";
        $.ajax({
           type: "POST",
           //url: "./app/models/login.php",
           url: "./calender/action/load_data.php",
           data: {username : username , password : password , check : '1' , id :id}, // serializes the form's elements.
           success: function(result){
              if(result == '1'){ 
                // content_error.innerHTML = "success !";
                // content_error.style.display = 'block';
                // opentabs('member_schedule');
                window.location= '/kit_club/index.php?url=user/index';
              }
              else{
                let content_error = document.getElementById('content_error');
                content_error.innerHTML = "username or password error !";
                content_error.style.display = 'block';
              }
           }
        });
      }); 
    }
</script>
<style type="text/css">

</style>
<div class="col-md-10 content" id="login_schedule_member">
     <div class="form_content" align="center">
            <h2>Xem thời khóa biểu sinh viên</h2>
            <h1 id="kitclub">CLB KIT !</h1>

        </div>
    <form id="idForm_schedule_member" style="margin: 0 auto ; width: 60%;">
      <div class="form-group">
        <label >Tài khoản trường</label>
        <input type="text" class="form-control" aria-describedby="emailHelp"  name="username" id="username_schesule_member" required="" placeholder="Tài khoản">
        
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" id="password_schedule_member" required="" placeholder="Mật khẩu">
      </div>
      <input type="submit" name="submit" id="submit_schedule_member" class="btn btn-primary" value="Đăng nhập">
       <div id="content_error" class="alert alert-danger" style="display: none; margin-top: 20px;"></div>
    </form>
   
</div>
