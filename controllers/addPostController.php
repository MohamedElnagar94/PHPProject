<?php
    include "../database/connection.php";
    session_start();
    if(isset($_POST['createPost'])){
        $postContent = $_POST["postContent"];
        $username = $_SESSION["username"];
        $email = $_SESSION["email"];
        $post =mysqli_escape_string($connect,$postContent);
        $queryUser = "SELECT * FROM users where username = '$username' and email = '$email'";
        $resultUser = mysqli_query($connect,$queryUser);
        $rowUser = mysqli_fetch_assoc($resultUser);
        $id = $rowUser["id"];

        $queryPost = "INSERT INTO `post`(`postContent`, `user_id`) VALUES ('$post',$id)";
        $resultPost = mysqli_query($connect,$queryPost);

        $queryPostSelect = "SELECT * FROM post ORDER BY id DESC LIMIT 1";
        $resultPostSelect = mysqli_query($connect,$queryPostSelect);
        $rowPost = mysqli_fetch_assoc($resultPostSelect);

        if(!$resultUser){
            $obj = [
                "userFALSE" => "user",
            ];
            echo json_encode($obj);
    //        echo "postTRUE";
        }else if(!$resultPost){
            $obj = [
                "postFALSE" => "post",
            ];
            echo json_encode($obj);
    //        echo "postFALSE";
        }else{
            $obj = [
                "userTRUE" => "true",
                "postTRUE" => "true",
                "idUser" => $rowUser["id"],
                "username" => $rowUser["username"],
                "idPost" => $rowPost["id"],
                "postContent" => $rowPost["postContent"],
            ];
            echo json_encode($obj);
        }
    }

    if(isset($_POST['comment'])){
        $message = $_POST["message"];
        $username = $_SESSION["username"];
        $email = $_SESSION["email"];
        $post_id = $_POST["post_id"];
        $comment =mysqli_escape_string($connect,$message);

        $queryUser = "SELECT * FROM users where username = '$username' and email = '$email'";
        $resultUser = mysqli_query($connect,$queryUser);
        $rowUser = mysqli_fetch_assoc($resultUser);
        $id = $rowUser["id"];

        $queryComment = "INSERT INTO `comments`(`comment`, `user_id`, `post_id`) VALUES ('$message',$id,$post_id)";
        $resultComment = mysqli_query($connect,$queryComment);

        $querySelect = "SELECT * FROM comments ORDER BY id DESC LIMIT 1";
        $resultSelect = mysqli_query($connect,$querySelect);
        $rowComment = mysqli_fetch_assoc($resultSelect);
    //    $json = json_decode($row["id"]);
        if(!$resultUser){
            $obj = [
                "userFALSE" => "user",
            ];
            echo json_encode($obj);
        }else if(!$resultComment){
            $obj = [
                "commentFALSE" => "comment",
            ];
            echo json_encode($obj);
        }else{
            $obj = [
                "userTRUE" => "true",
                "postTRUE" => "true",
                "idUser" => $rowUser["id"],
                "username" => $rowUser["username"],
                "idComment" => $rowComment["id"],
                "commentContent" => $rowComment["comment"],
            ];
            echo json_encode($obj);
        }
    }

    if(isset($_POST['editComment'])){
        $message = $_POST["message"];
        $comment_id = $_POST["id"];
        $user_id = $_POST["user_id"];
        $username = $_SESSION["username"];
        $email = $_SESSION["email"];

        $queryUser = "SELECT * FROM users where username = '$username' and email = '$email'";
        $resultUser = mysqli_query($connect,$queryUser);
        $rowUser = mysqli_fetch_assoc($resultUser);
        $id = $rowUser["id"];
        if($rowUser["id"] !== $user_id){
            $obj = [
                "error" => "userError",
            ];
            echo json_encode($obj);
        }else{
            $comment =mysqli_escape_string($connect,$message);
            $query = "UPDATE comments SET comment = '$message' WHERE id = $comment_id";
            $result= mysqli_query($connect,$query);
            if($result){
                echo "true";
            }else{
                echo "false";
            }
        }

    }

    if(isset($_POST['deleteComment'])){
        $comment_id = $_POST["id"];
        $user_id = $_POST["user_id"];
        $username = $_SESSION["username"];
        $email = $_SESSION["email"];

        $queryUser = "SELECT * FROM users where username = '$username' and email = '$email'";
        $resultUser = mysqli_query($connect,$queryUser);
        $rowUser = mysqli_fetch_assoc($resultUser);
        $id = $rowUser["id"];
        if($rowUser["id"] !== $user_id){
            $obj = [
                "error" => "userError",
            ];
            echo json_encode($obj);
        }else{
            $query = "DELETE FROM comments WHERE id = $comment_id";
            $result= mysqli_query($connect,$query);
            if($result){
                echo "true";
            }else{
                echo "false";
            }
        }
    }

    if(isset($_POST['deletePost'])){
        $post_id = $_POST["id"];
        $user_id = $_POST["userID"];
        $username = $_SESSION["username"];
        $email = $_SESSION["email"];

        $queryUser = "SELECT * FROM users where username = '$username' and email = '$email'";
        $resultUser = mysqli_query($connect,$queryUser);
        $rowUser = mysqli_fetch_assoc($resultUser);
        $id = $rowUser["id"];
        if($rowUser["id"] !== $user_id){
            $obj = [
                "error" => "userError",
            ];
            echo json_encode($obj);
        }else{
            $queryComment = "DELETE FROM comments WHERE post_id = $post_id";
            $resultComment = mysqli_query($connect,$queryComment);
            $queryPost = "DELETE FROM post WHERE id = $post_id";
            $resultPost = mysqli_query($connect,$queryPost);
            if(!$resultPost){
                $obj = [
                    "postFALSE" => "post",
                ];
                echo json_encode($obj);
            }else if(!$resultComment){
                $obj = [
                    "commentFALSE" => "comment",
                ];
                echo json_encode($obj);
            }else{
                $obj = [
                    "postTRUE" => "true",
                    "commentTRUE" => "true"
                ];
                echo json_encode($obj);
            }
        }

    }
//echo "mohamed";
//$message = $_POST["message"];
//$comment = [
//    "username" => "Mohamed Elnagar",
//    "email" => "mohamedelnagar461@yahoo.com",
//    "message" => $message
//];
//
//$content = file_get_contents("../database/comments.json");
//$data = json_decode($content,true);
//$data[] = $comment;
//$result=json_encode($data);
//$newData = file_put_contents('../database/comments.json', $result);
//echo json_encode($data);


