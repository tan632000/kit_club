<!DOCTYPE html>
<HTML>

<head>
    <title>KIT-CLUB</title>
    <meta charset='utf-8' />
    <meta content='width=device-width, initial-scale=1' name='viewport' />
    
    <link rel="stylesheet" type="text/css" href="../kit_club/app/views/home/icon/all.css">

    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="../kit_club/app/views/home/js/wow.js"></script>
     <script src="../kit_club/app/views/home/js/modal-loading.js"></script>
<!-- \\    <script type="text/javascript" src="../kit_club/app/views/home/js/menu.js"></script>
 -->    <link rel="stylesheet" href="../kit_club/app/views/home/css/alimate.css">
    <link rel="stylesheet" type="text/css" href="../kit_club/app/views/home/css/css.css">
    <link rel="stylesheet" type="text/css" href="../kit_club/app/views/home/css/style.css">
    <link rel="stylesheet" type="text/css" href="../kit_club/app/views/home/css/modal-loading-animate.css">
    <link rel="stylesheet" type="text/css" href="../kit_club/app/views/home/css/modal-loading.css">
   
</head>

<body class='index'>
    <!-- MAIN HEADER -->
     
    <div id="header">
        <script type="text/javascript">
            $('#header').load('../kit_club/app/views/home/head.html');
        </script>
    </div>

    <div class='clear'></div>

    <!-- Thanh giới thiệu -->
    <div class='hero' id='hero1'>
        <div class='inner1'>
            <div class="hero1">
                 <!-- EFFECT SNOWS  -->

                <div id="effectSnows">
                    <script type="text/javascript">
                        $('#effectSnows').load('../kit_club/app/views/home/effectSnows.html');
                    </script>
                </div>

                
            </div>

             <!-- Banner  -->
            
            <div id="Banner">
                <script type="text/javascript">
                    $('#Banner').load('../kit_club/app/views/home/Banner.html');
                </script>
            </div>

            
            
        </div>
    </div>
    <div class='clear'></div>

    <!-- CONTENT  -->
    <div id='wrapper'>
        <div id='sider'>
            <div id='left-aside'>
                <div id='artikel'>
                    <div class='main section' id='main'>
                        <div class='widget Blog' id='Blog1'>
                            <div class='blog-posts hfeed'>
                                <div class="date-outer">
                                    <div class="date-posts">
                                         <!-- content 1 -->
                                        <div class="show-posts">
                                        <div id="content">                                      
                                        <h2 style="text-align:center" class="title_"><?=$homeDetailNews['title']?></h2>
                                        <div class="poster"><i class="date-post"> <span><i class="fas fa-user-edit"></i> Đăng bởi Trường Giang</span> 21:15 T4,13/11/2019</i></div>
                                        <img class="center"  src="public/img_news/<?=$homeDetailNews['images']?>" alt="">
                                        <div class="content_deitails">
                                            <?=$homeDetailNews['content']?>
                                        </div>
                                        <a href="/kit_club"><div class="icon-back"><i class="fas fa-arrow-circle-left"></i></div></a>
                                        </div>
                                        <div class='clear'></div> 
                                        </div>                                    
                                   <!-- FOOTER -->
                                    <div id="footer">
                                        <script type="text/javascript">
                                            $('#footer').load('../kit_club/app/views/home/footer.html');
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- LOGIN PC  -->
    <div id="loginPC">
        
        <script type="text/javascript">
            $('#loginPC').load('../kit_club/app/views/home/login/loginAjax.html');
        </script>
    </div>

     <!-- FORGET PASSWORD PC  -->
    
     <div id="forgotPasswordPC">
        <script type="text/javascript">
            $('#forgotPasswordPC').load('../kit_club/app/views/home/login/forgotPasswordPC.html');
        </script>
    </div> 

     <!-- LOGIN MOBILE  -->
    
     <div id="loginMobie">
        <script type="text/javascript">
            $('#loginMobie').load('../kit_club/app/views/home/login/loginMobie.html');
        </script>
    </div> 


     <!-- FORGET PASSWORD MOBILE  -->
    
     <div id="forgotPasswordMobie">
        <script type="text/javascript">
            $('#forgotPasswordMobie').load('../kit_club/app/views/home/login/forgotPasswordMobie.html');
        </script>
    </div> 


     <!-- Thời khóa biểu mobile   -->
     <div id="login_tkb_Mobie">
        <script type="text/javascript">
            $('#login_tkb_Mobie').load('../kit_club/app/views/home/login/login_tkb_Mobie.html');
        </script>
    </div> 

     <!-- Thời khóa biểu - PC  -->
    
    <div id="login_tkb_PC">
        <script type="text/javascript">
            $('#login_tkb_PC').load('../kit_club/app/views/home/login/login_Ajax_tkb.html');
        </script>
    </div>

    <div class="icon-content">
        <i class="fas fa-align-justify" onclick="show()"></i>
    </div>
    <div class="icon-content-back">
        <i class="fas fa-times-circle" onclick="hide()"></i>
    </div>
</body>


</HTML>