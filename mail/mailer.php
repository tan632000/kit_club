<?php

    // require library
    require "PHPMailer-master/src/Exception.php";
    require "PHPMailer-master/src/OAuth.php";
    require "PHPMailer-master/src/PHPMailer.php";
    require "PHPMailer-master/src/POP3.php";
    require "PHPMailer-master/src/SMTP.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Mail extends PHPMailer{
        function __construct($Username = 'babykhang407@gmail.com', $Password = 'kitclub123'){
            PHPMailer::__construct(true);
            $this->Username = $Username;
            $this->Password = $Password;
            $this->config();
        }
        function config(){

            $this->CharSet = 'UTF-8';
            $this->SMTPDebug = 0;                                 // debug
            $this->isSMTP();                                      // Set mailer to use SMTP
            $this->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $this->SMTPAuth = true;                               // Enable SMTP authentication
            $this->Username = $this->Username;                    // SMTP username
            $this->Password = $this->Password;                    // SMTP password
            $this->SMTPSecure = 'tls'; 
            // $this->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                           // or ssl
            $this->Port = 587;
            $this->isHTML(true);                           
        }
        function splitMail($mailList){
               
               if(isset($mailList)){
                $emails = $mailList;
                $mailArray = array();
                    foreach (explode("\n", $emails) as $email) {
                        if(filter_var(trim($email), FILTER_VALIDATE_EMAIL)){
                            array_push($mailArray, $email);
                        }
           // echo $email;
                    }
         // echo "<pre>".$email."</pre>";
                }
                return $mailArray;
        }
        function createRandomPass($size){

            $newPass = '';
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            for($i=0;$i<$size;$i++){
                $newPass .= $chars[rand(0,strlen($chars)-1)];
            }
            return $newPass;
        }

        function forgetPassword($mailReveive='',$newPass){
            //$mailReveive = $mailReveive;
    // mail content   
            $mailContent = 'Mật khẩu mới của bạn '. $newPass . ', vui lòng thay đổi mật khẩu';
            $this->sendNewMail($mailReveive, $mailContent, "ĐỔI MẬT KHẨU", "Mật khẩu mới");
        }

        function sendMail($mailContent, $mailHeader, $mailSubject){
            // 
            try{              
                $this->setFrom($this->Username, $mailHeader);  
                $this->Subject = $mailSubject;
                $this->Body = $mailContent;
                $this->send();
                return true;
                //echo "Gửi mail cho {$mailReveive} thành công.";
            }
            catch(Exception $e){
                echo "Gửi mail cho {$mailReveive} thất bại.";
                echo 'Có lỗi xảy ra: '.$e;
                return false;
            }

        }
        function sendNewMail($mailReveive,$mailContent, $mailHeader, $mailSubject){
            try{              
                $this->setFrom($this->Username, $mailHeader); 
                $this->addBCC($mailReveive);
                $this->Subject = $mailSubject;
                $this->Body = $mailContent;
                $this->send();
                return true;
                //echo "Gửi mail cho {$mailReveive} thành công.";
            }
            catch(Exception $e){
                echo "Gửi mail cho {$mailReveive} thất bại.";
                echo 'Có lỗi xảy ra: '.$e;
                return false;
            }
        }
        function sendMails($emails){
            foreach($emails as $email){
                $this->sendMail($email['recever'], $email['content'], $email['header'], $email['subject']);
            }
        }
    }
?>