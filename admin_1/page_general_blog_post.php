<?php
    session_start();
    if(isset($_SESSION["username"]) && isset($_SESSION["email"])){
    include "../includes/header.php"
?>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <?php include "../includes/navBar.php"?>
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">

            <?php include "../includes/sideBar.php"?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.php">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>General</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Blog Post
                        <small>blog post samples</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->

                    <div class="blog-page blog-content-2">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="well well-sm well-social-post">
                                    <form>
                                        <ul class="list-inline" id='list_PostActions'>
                                            <li class='active'><a href='#'>Update status</a></li>
<!--                                            <li><a href='#'>Add photos/Video</a></li>-->
<!--                                            <li><a href='#'>Create photo album</a></li>-->
                                        </ul>
                                        <textarea class="form-control postEditor" placeholder="What's in your mind?"></textarea>
                                        <ul class='list-inline post-actions'>
                                            <li><a href="#"><span class="glyphicon glyphicon-camera"></span></a></li>
                                            <li><a href="#" class='glyphicon glyphicon-user'></a></li>
                                            <li><a href="#" class='glyphicon glyphicon-map-marker'></a></li>
                                            <li class='pull-right'><a href="#" class='btn btn-primary btn-xs createPost'>Post</a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <li class="comment commentGlobal d-none">
                            <a class="pull-left" href="#">
                                <img class="avatar"
                                     src="../assets/Images/user_1.jpg"
                                     alt="avatar">
                            </a>
                            <div class="comment-body">
                                <div class="comment-heading">
                                    <h4 class="user userCreatorComment">Mohamed Elnagar</h4>
                                    <h5 class="time">5 minutes ago</h5>
                                </div>
                                <p class="no-margin border border-grey commentParagraph" style="padding: 5px; margin: 10px 0"></p>
                                <a href="javascript:;"
                                   class="btn btn-xs green editComment">
                                    <span>Edit</span>
                                    <i class="fa fa-font"></i>
                                    <input type="text" class="idComment d-none" value="">
                                    <input type="text" class="userID d-none" value="">
                                </a>
                                <a href="javascript:;"
                                   class="btn btn-xs red deleteComment"> Delete
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                        </li>
                        <div id="" class="postCount d-none" style="display: inline-block;">
                            <div class="panel panel-white post panel-shadow">
                                <div class="post-heading">
                                    <div class="actions" style="display: flex;justify-content: space-between;align-items: center">
                                        <div>
                                            <div class="pull-left image">
                                                <img src="../assets/Images/user_1.jpg"
                                                     class="img-circle avatar" alt="user profile image">
                                            </div>
                                            <div class="pull-left meta">
                                                <div class="title h5">
                                                    <a href="#"><b class="usernameCreator">Mohamed Elnagar</b></a>
                                                    made a post.
                                                </div>
                                                <h6 class="text-muted time">1 minute ago</h6>
                                            </div>
                                        </div>
                                        <input type="text" class="d-none deletePost" value="">
                                        <input type="text" class="d-none postUserCreator" value="">
                                        <i class="icon-trash btn btn-circle btn-icon-only btn-default ancorDeletePost"></i>
                                    </div>
                                </div>
                                <div class="post-description">
                                    <p class="postContent">idComment</p>
                                    <div class="stats">
                                        <a href="#" class="btn btn-default stat-item">
                                            <i class="fa fa-thumbs-up icon"></i>2
                                        </a>
                                        <a href="#" class="btn btn-default stat-item">
                                            <i class="fa fa-share icon"></i>12
                                        </a>
                                    </div>
                                </div>
                                <div class="post-footer">
                                    <ul class="comments-list">

                                    </ul>
                                    <div class="input-group">
                                        <input class="form-control message mohamed" name="message" placeholder="Add a comment" type="text">

                                        <input class="form-control post_id d-none" name="post_id" placeholder="post_id" type="text" value="">
                                        <span class="input-group-addon">
                                            <a href="#"><i class="fa fa-edit"></i></a>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bodyPost" style="column-count: 2;">
                            <?php
                                include "../database/connection.php";
//                                $query = "SELECT * FROM post,users WHERE users.id = post.user_id ORDER BY post.id DESC";
//                                $result = mysqli_query($connect,$query);
//                                while($row = mysqli_fetch_assoc($result)) {
                                $query = "SELECT post.id,post.postContent,post.user_id,users.username,users.email FROM post,users WHERE users.id = post.user_id ORDER BY post.id DESC";
                                $result = mysqli_query($connect,$query);
                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div id="post_<?php echo $row["id"]?>" style="display: inline-block;">
                                <div class="panel panel-white post panel-shadow">
                                    <div class="post-heading">
                                        <div class="actions" style="display: flex;justify-content: space-between;align-items: center">
                                            <div>
                                                <div class="pull-left image">
                                                    <img src="../assets/Images/user_1.jpg"
                                                         class="img-circle avatar" alt="user profile image">
                                                </div>
                                                <div class="pull-left meta">
                                                    <div class="title h5">
                                                        <a href="#"><b><?php echo $row["username"] ?></b></a>
                                                        made a post.
                                                    </div>
                                                    <h6 class="text-muted time">1 minute ago</h6>
                                                </div>
                                            </div>
                                            <input type="text" class="d-none deletePost" value="<?php echo $row["id"]?>">
                                            <input type="text" class="d-none postUserCreator" value="<?php echo $row["user_id"] ?>">
                                            <i class="icon-trash btn btn-circle btn-icon-only btn-default ancorDeletePost"></i>
                                        </div>
                                    </div>
                                    <div class="post-description">
                                        <p><?php echo $row["postContent"] ?></p>
                                        <div class="stats">
                                            <a href="#" class="btn btn-default stat-item">
                                                <i class="fa fa-thumbs-up icon"></i>2
                                            </a>
                                            <a href="#" class="btn btn-default stat-item">
                                                <i class="fa fa-share icon"></i>12
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-footer">
                                        <ul class="comments-list">

                                            <?php
//                                                $queryComments = "SELECT * FROM comments,post GROUP BY id";
//                                                $resultComments = mysqli_query($connect,$queryComments);
//                                                while($rowComment = mysqli_fetch_assoc($resultComments))
                                                $queryComments = "SELECT comments.id,username,comment,user_id,post_id FROM users,comments where users.id = comments.user_id";
                                                $resultComments = mysqli_query($connect,$queryComments);
                                                while($rowComment = mysqli_fetch_assoc($resultComments))
                                                {
//                                                    $content = file_get_contents("../database/comments.json");
//                                                    $data = json_decode($content, true);
//                                                    if ($data !== null) {
//                                                        foreach ($data as $comment) {
                                                if($rowComment["post_id"] === $row["id"]){
                                                    ?>
                                                    <li class="comment">
                                                        <a class="pull-left" href="#">
                                                            <img class="avatar"
                                                                 src="../assets/Images/user_1.jpg"
                                                                 alt="avatar">
                                                        </a>
                                                        <div class="comment-body">
                                                            <div class="comment-heading">
                                                                <h4 class="user"><?php echo $rowComment["username"] ?></h4>
                                                                <h5 class="time">5 minutes ago</h5>
                                                            </div>
                                                            <p class="no-margin border border-grey"
                                                               style="padding: 5px; margin: 10px 0"><?php echo $rowComment["comment"] ?></p>
                                                            <?php
                                                                if($_SESSION["username"] === $rowComment["username"]){
                                                            ?>
                                                            <a href="javascript:;"
                                                               class="btn btn-xs green editComment">
                                                                <span>Edit</span>
                                                                <i class="fa fa-font"></i>
                                                                <input type="text" class="idComment d-none" value="<?php echo $rowComment["id"] ?>">
                                                                <input type="text" class="userID d-none" value="<?php echo $rowComment["user_id"] ?>">
                                                            </a>
                                                            <a href="javascript:;"
                                                               class="btn btn-xs red deleteComment"> Delete
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                        <div class="input-group">
                                            <input class="form-control message" name="message" placeholder="Add a comment" type="text">
                                            <input class="form-control post_id d-none" name="post_id" placeholder="post_id" type="text" value="<?php echo $row["id"] ?>">
                                            <span class="input-group-addon">
                                                <a href="#"><i class="fa fa-edit"></i></a>
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <?php include "../includes/footer.php"?>
    </body>
</html>
<?php
    }else{
        header("location:page_user_login_1.php");
    }

?>