 <!-- quản lý Tài khoản -->
 <div class="col-md-10 content " id="account">
        <section class="content-header">

            <h1>
                Quản lý
                <small>Control panel</small>
            </h1>
            <div class="breadcrumb">
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a>
                </li>
                <li class="active">Tài khoản</li>
            </div>
        </section>
        <div class="example">
            <div class="container">
                <div class="row account">
                    <h1>Cài đặt tài khoản</h1>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>

                                <td>
                                    <p>Tên đăng nhập</p>
                                </td>

                                <td>
                                    <p><?=$_SESSION['user']['fullname']?></p>
                                </td>

                              
                            </tr>
                            <tr>

                                <td>
                                    <p>Mật khẩu</p>
                                </td>

                                <td>
                                    <p>**********</p>
                                </td>

                              
                            </tr>
                            <tr>

                                <td>
                                    <p>Email</p>
                                </td>

                                <td>
                                    <p><?=$_SESSION['user']['email']?></p>
                                </td>

                              
                            </tr>
                            <tr>

                                <td>
                                    <p><?=$_SESSION['user']['phone']?></p>
                                </td>

                                <td>
                                    <p>0366833583</p>
                                </td>

                              
                            </tr>
                            <tr>

                                <td>
                                    <p>Lớp</p>
                                </td>

                                <td>
                                    <p><?=$_SESSION['user']['student_id']?></p>
                                </td>

                              
                            </tr>
                            <tr>

                                <td>
                                    <p>Ảnh đại diện</p>
                                </td>

                                <td><img src="public/img/<?=$_SESSION['user']['avatar']?>" alt="" width="50px" height="60px"></td>

                             
                              
                            </tr>
                        </tbody>
                    </table>
                    <a href="/kit_club/admin.php?url=member/edit/<?=$_SESSION['user']['id']?>"> <button type="submit" class="btn btn-success">Chỉnh sửa</button> </a>
                </div>
            </div>
        </div>
    </div>