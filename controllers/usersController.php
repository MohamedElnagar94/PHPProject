<?php
include "../database/connection.php";
session_start();
// echo $_FILES["user_img"]["tmp_name"];
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
// $query = "SELECT * FROM rooms,users WHERE users.room_id = rooms.id";
// $result = mysqli_query($connect,$query);
// $row = mysqli_fetch_assoc($result);
// echo "<pre>";
// print_r($row);
// echo "</pre>";
if (isset($_POST["saveEdit"])) {
    $target_dir = "../assets/Images/";
    $target_file = $target_dir . basename($_FILES["user_img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $id = $_POST["id"];
    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ext = $_POST["ext"];
    $room_id = $_POST["room_id"];
    if($_FILES["user_img"]["tmp_name"] !== ""){
        $temp = explode(".", $_FILES["user_img"]["name"]);
        $newfilename = 'image_'.time().'.' . end($temp);
        if (move_uploaded_file($_FILES["user_img"]["tmp_name"], $target_dir.$newfilename)) {
            echo "The file " . basename($_FILES["user_img"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        $query = "UPDATE users SET user_name = '$user_name',email = '$email', password = '$password',ext = '$ext',room_id = $room_id,user_img = '$newfilename' WHERE id = $id";
        $result= mysqli_query($connect,$query);
        if($result){
            header("location:../admin_1/users.php");
        }else{
            echo "false";
        }
    }else{
        $query = "UPDATE users SET user_name = '$user_name',email = '$email', password = '$password',ext = '$ext',room_id = $room_id WHERE id = $id";
        $result= mysqli_query($connect,$query);
        if($result){
            header("location:../admin_1/users.php");
        }else{
            echo "false";
        }
    }
}

if(isset($_POST['deleteUser'])){
    $user_id = $_POST["id"];
    $query = "DELETE FROM users WHERE id = $user_id";
    $result= mysqli_query($connect,$query);
    if($result){
        echo "true";
    }else{
        echo "false";
    }
}