<!DOCTYPE html>
<HTML>

<head>
    <title>KIT-CLUB</title>
    <meta charset='utf-8' />
    <meta content='width=device-width, initial-scale=1' name='viewport' />
    
    <link rel="stylesheet" type="text/css" href="../kit_club/app/views/home/icon/all.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
                                        <div id="content">
                                        <?php
if(!empty($homeNewNews))                    
foreach($homeNewNews as $row =>$key)

{
  
   $tx=parent::format($key['content']);
   
    ?>
    
<div class='post-outer wow bounceInLeft' data-wow-delay='0.1s'>
        <article class='post hentry'>
            <a href="/kit_club/index.php?url=news/detail/<?=$key['id']?>" >
                <div class='img-thumbnail'>
                    <span class='overlay'>
                        <div CLASS='info-wrapper'>Xem chi tiết</div>
                    </span>
                    <img src="public/img_news/<?=$key['images']?>">
                </div>
                <h2 class='post-title entry-title'>
                    <a href='#'  title='Google phát hiện lỗ hổng bảo mật trên một loạt smartphone' class="wow bounce" data-wow-delay="0.5s"> 
                        <h3><?=$key['title']?></h3> 
                    </a>
                </h2>
                <div class='post-body'>
                    <div class="post-summary" >
                    <?=$key['content']?>
                    </div>
                </div>
            </a>
            <!-- <div class='aishare'>
                <ul>
                    <li><a class='lyco-facebook' href='https://www.facebook.com/sharer.php?u=http://youtube.com' rel='nofollow noopener' target='_blank'><i class='fab fa-facebook-f'></i><span class='inv'></span></a></li>
                </ul>
            </div> -->
            <div class='post-info'>
                <span class='author-info'>
                    <i class='fa fa-user'></i>
                    <span class='vcard'>
                        <span class='fn'>
                            <a class='g-profile' href='#' rel='author' title='author profile'>
                                <span><?=$key['author']?></span>
                            </a>
                        </span>
                    </span>
                </span>
                <span class='time-info'>
                    <i class='fa fa-calendar-o'></i>
                    <a class='timestamp-link' href='#' rel='bookmark' title='permanent link'><abbr class='published updated' title=''><?=$key['createdate']?></abbr></a>
                </span>
            </div>
        </article>
    </div>
<?php
}?>
                                        </div>

                                        <div class='clear'></div>
                                         <!-- pagination -->
                                        <div class="example">
                                            <div class="page-order">
                                                <ul class="pagination">
                                                    <li><a href="/kit_club/index.php?url=home/index/1" class="wow bounceInLeft" data-wow-delay="0.3s">&laquo;</a></li>
                                                    <li><a href="/kit_club/index.php?url=home/index/1" class="wow bounceInLeft" data-wow-delay="0.2s">1</a></li>
                                                    <li><a href="/kit_club/index.php?url=home/index/2" class="wow bounceInLeft" data-wow-delay="0.1s">2</a></li>
                                                    <li><a href="#" class="wow wobble" data-wow-delay="0.1s">3</a></li>
                                                    <li><a href="#" class="wow bounceInRight" data-wow-delay="0.1s">4</a></li>
                                                    <li><a href="#" class="wow bounceInRight" data-wow-delay="0.2s">5</a></li>
                                                    <li><a href="#" class="wow bounceInRight" data-wow-delay="0.3s">&raquo;</a></li>
                                                </ul>
                                            </div>
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


</body>


</HTML>