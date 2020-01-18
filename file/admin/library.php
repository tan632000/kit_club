<?php
require_once "ClassDatabase.php";
// require_once "library.php";
class Library
{
    public function uploadImages($path, $nameTag)
    {
        // $img = $_POST['img'];
        $error       = "";
        $target_dir  = $path;
        $targetImage = $target_dir . basename($_FILES[$nameTag]['name']);
        $typeImage   = pathinfo($_FILES[$nameTag]['name'], PATHINFO_EXTENSION); // lấy kiêu file người dùng upload
        $sizeImage   = $_FILES[$nameTag]['size'];
        $typeAllow   = array(
            'png',
            'jpg',
            'jpeg'
        ); // kiểu file cho phép
        // validate type img
        if (!in_array(strtolower($typeImage), $typeAllow)) {
            $error .= "Ảnh bạn tải lên không được hỗ trợ";
        }
        // validate img size
        if ($sizeImage > 5242880) {
            $error .= " Ảnh của bạn không được vượt quá 5mb";
        }
        // check img exist
        if (file_exists($targetImage)) {
            $error .= " Ảnh đã tồn tại";
        }
        if ($error == "") {
            if (move_uploaded_file($_FILES['img']['tmp_name'], $targetImage)) {
                // echo "Upload thành công";
                return $targetImage;
            }
        } else {
            // echo $error;
            return false;
        }
    }
    public function newsMethod($method, $image = '', $id = '')
    {
        // $image = $posts -> uploadImages("../../public/img/news/thumbnail/".$_POST['tags']."/");
        $database = new Database();
        $database->connect();
        switch ($method) {
            case 'create':
                $title       = $_POST['title'];
                $content     = $_POST['content'];
                $createDate  = date("d/m/y");
                $author      = '1';
                $tags        = $_POST['tags'];
                $description = $_POST['description'];
                
                $check = 0;
                
                if ($image != "") {
                    if (!empty($title) || !empty($content) || !empty($createDate) || !empty($author) || !empty($tags) || !empty($description) || !empty($image)) {
                        $sql = "INSERT INTO news (title,content,createdate,images,description,author,tags) VALUES ('$title','$content','$createDate','$image','$description','$author','$tags')";
                        $database->query($sql);
                        $database->disconnect();
                        $check = 1;
                    }
                }
                if ($check == 1) {
                    echo "Tải bài viết thành công";
                    // header("Location: listPost.php");
                } else {
                    echo "Thất bại, kiểm tra lại dữ liệu";
                }
                break;
            case 'delete':
                $id       = trim(htmlspecialchars(addslashes($id)));
                // echo $id;   
                // $checkIdExist = "SELECT FROM news WHERE id = $id";
                // echo $database -> rows($checkIdExist);
                // if($database->rows($checkIdExist)){
                //     echo 1;
                // }
                // var_dump($query);//
                $response = "";
                if (isset($id)) {
                    $sql = "SELECT images FROM news WHERE id = $id";
                    
                    $result = mysqli_query($database->connect, $sql);
                    $row    = mysqli_fetch_assoc($result);
                    unlink($row['images']);
                    $sql = "DELETE FROM news WHERE id = $id";
                    $database->query($sql);
                    $database->disconnect();
                    $response = "success";
                    // return $response;
                }
                return $response;
                break;
            case 'repair':
                
            default:
                # code...x
                break;
        }
    }   
}
?>
