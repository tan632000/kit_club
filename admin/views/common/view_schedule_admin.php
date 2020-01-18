


<div class="col-md-10 content " id="view_schedule_admin">
    <script type="text/javascript">
    let data_text = '<?php echo $_SESSION['user']['student_text']; ?>';
    if(data_text === ''){
        opentabs('login_schedule_admin');
    }
</script>
<h1>
        Quản lý
        <small>Control panel</small>
    </h1>
    <div class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a>
        </li>
        <li class="active">Dashboard</li>
        <li class="active">Thời khóa biểu</li>
    </div>
    <div class="example" style="margin-top: -1%">
            <div class="container">
<div class="container col-sm-4 col-md-7 col-lg-5 mt-5">
    <div class="block">
        <div class="card">       
        <h3 class="card-header" id="monthAndYear"></h3>       
        <table class="table table-bordered table-responsive-sm" id="calendar" >
            <thead>
            <tr>
                <th>Chủ nhật</th>
                <th>Thứ 2</th>
                <th>Thứ 3</th>
                <th>Thứ 4</th>
                <th>Thứ 5</th>
                <th>Thứ 6</th>
                <th>Thứ 7</th>
            </tr>
            </thead>

            <tbody id="calendar-body">

            </tbody>
        </table>

        <div class="form-inline">

            <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="previous()">Tháng trước</button>

            <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Tháng sau</button>
        </div>
        <br/>
        <form class="form-inline">
            <label class="lead mr-2 ml-2" for="month">Tìm tới: </label>
            <select class="form-control "  name="month" id="month" onchange="jump()">
                <option value=0>Tháng 1</option>
                <option value=1>Tháng 2</option>
                <option value=2>Tháng 3</option>
                <option value=3>Tháng 4</option>
                <option value=4>Tháng 5</option>
                <option value=5>Tháng 6</option>
                <option value=6>Tháng 7</option>
                <option value=7>Tháng 8</option>
                <option value=8>Tháng 9</option>
                <option value=9>Tháng 10</option>
                <option value=10>Tháng 11</option>
                <option value=11>Tháng 12</option>
            </select>


            <label for="year"></label>
        <select class="form-control " name="year" id="year" onchange="jump()">          
            <option value=2019>2019</option>
            <option value=2020>2020</option>
            <option value=2021>2021</option>
        </select></form>
    </div>
   <!--  <div>
        <button class="btn btn-outline-primary logout" onclick="logout();">Logout</button>
    </div> -->
    <div id="_demo_view_schedule_admin"></div>
    </div>
    
    
</div>
</div>  
</div>
</div>
<!--<button name="jump" onclick="jump()">Go</button>-->
<script src="../kit_club/calender/js/script_tkb_kit.js"></script>

<!-- Optional JavaScript for bootstrap -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

