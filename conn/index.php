<?php
session_start();
$conn = mysqli_connect('localhost','root','','web_kit');
// lay toan du lieu cua user
function data($db)
{
     while($row = mysqli_fetch_assoc($db))
    {
         $user=$row;
    }
    return $user;
}
function sumPer($nhom,$conn){
     $sum = 0;
     $sql = "SELECT permission_id FROM group_permission WHERE group_id = $nhom";
        $results = mysqli_query( $conn, $sql );
        while($row = mysqli_fetch_assoc($results))
        {
          die($row);
        }
     
        
     while($row = mysqli_fetch_array($results,MYSQLI_ASSOC)){
        $row["permission_id"].'</br>';
        $sum += pow(2,$row["permission_id"]-1);
     }
      return $sum;
 }
 function checkUser($user_id,$conn){
     $sql = "SELECT group_id FROM user_group WHERE user_id = $user_id";
     $results = mysqli_query( $conn, $sql );
     while($row = mysqli_fetch_array($results,MYSQLI_ASSOC)){
         $group=$row['group_id'];
     }
     return $group;  
 }
if($conn)
{
    
   $pass = md5($_POST['password']);
   $query = " SELECT * FROM users WHERE  username = '{$_POST['username']}' and password = '{$pass}' ";
   $result = mysqli_query($conn, $query);
   $user =data($result);
   //$user['username'];
  $user_id=$user['id'];

  $checkus= checkUser ($user_id, $conn);
// die($checkus);
  $sum = 0;
  $sql = "SELECT permission_id FROM group_permission WHERE group_id = $checkus";
     $results = mysqli_query( $conn, $sql );
    
     while($row = mysqli_fetch_array($results,MYSQLI_ASSOC)){
          $su=$row["permission_id"];

          $sum += pow(2,$su-1);
      }


     $_SESSION['user'] = $user;
     $_SESSION['sumPer'] = $sum;
  
       //$_SESSION['sumPer'] = $sumPer;
       if(isset($_SESSION['user']) && $sum==4095 ){
          die('admin');
       }
       else
       
      die('member');
       

  
}



?>