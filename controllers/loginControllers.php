<?php
session_start();
include "../database/connection.php";
if (isset($_POST['email']) && isset( $_POST['password'])){
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $query = "select * from admin where email = '$email' and password = '$password'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_assoc($result);
    if($row){
        $_SESSION['username'] = $row["username"];
        $_SESSION['email'] = $row["email"];
        $obj = [
            "success" => "success",
        ];
        echo json_encode($obj);
    } else{
        $email = $_POST["email"];
        $password = $_POST["password"];
        $query = "select * from users where email = '$email' and password = '$password'";
        $result = mysqli_query($connect,$query);
        $row = mysqli_fetch_assoc($result);
        if($row){
            $_SESSION['username'] = $row["user_name"];
            $_SESSION['email'] = $row["email"];
            $obj = [
                "success" => "success",
            ];
            echo json_encode($obj);
        }else {
            $obj = [
                "error" => "error",
                "message" => "There is something wrong with email or password"
            ];
            echo json_encode($obj);
        }

    }

}
//else{
//    $obj = [
//        "error" => "not found",
//        "message" => "You should enter email and password"
//    ];
//    echo json_encode($obj);
//}
//$file = file("../database/comments.json");
//$file = fopen("../database/comments.json","r");
////$data[] = $comment;
//$oldData = fread($file,9999);
//$jsonObject = json_decode($oldData,true);
//$jsonObject[] = $comment;
//$jsonStr = json_encode($jsonObject);
////$newData = $jsonObject.array_push($comment[]);
//foreach ($jsonObject as $line) {
//    fputcsv($file, $line);
//}

//$send = fputcsv($file,$jsonStr);

//    $hashed_password = password_hash($password,PASSWORD_BCRYPT);
//    $check = password_verify($password,$hashed_password);
//    echo $hashed_password;
//    echo "<br>";
//    echo $chick;
//    var_dump(password_verify( "123456",md5("123456")));

