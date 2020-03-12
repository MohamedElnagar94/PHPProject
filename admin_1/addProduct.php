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
                            <span>Admin</span>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE BAR -->
                <!-- BEGIN PAGE TITLE-->
                <h3 class="page-title"><i class="fa fa-briefcase"></i> Add Product
                    <!--                    <small>blog post samples</small>-->
                </h3>
                <!-- END PAGE TITLE-->
                <!-- END PAGE HEADER-->

                <div class="blog-page blog-content-2">
                    <div class="row">
                        <div class="main">
                        <!-- Sign up form -->
                            <section class="signup">
                                <div class="container">
                                    <div class="signup-content">
                                        <div class="signup-form">
                                            <h2 class="form-title">Add Product</h2>
                                            <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data" action="../controllers/productsController.php">
                                                <div class="form-group">
                                                    <label for="productName"></label>
                                                    <input type="text" name="product_name" id="product_name" placeholder="Product Name"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Price"></label>
                                                    <input type="number" name="product_price" id="price" placeholder="Product's Price"/>
                                                </div>

                                                <div class="form-group">
                                                <span>Category</span>
                                                <select class="form-control form-control-md" name="categorySelect">
                                                    <option value="" selected disabled>Select</option>
                                                <?php 
                                                $conn=mysqli_connect("localhost","root","","cafeedb");
                                                $res=mysqli_query($conn,"select * from category");

                                                while($row = mysqli_fetch_array($res)){
                                                ?>
                                                    <option value=<?php echo $row["id"]?>> <?php echo $row["category_name"]?></option>
                                                <?php 
                                                }
                                                ?>
                                                </select>
                                                </div> 
                                                <div class="form-group">          
                                                    <div class="file-field">
                                                        <div class="btn  btn-sm float-left">
                                                            <input type="file" name="categoryImg">
                                                        </div>                                                   
                                                    </div>
                                                </div>   
                                                <div class="form-group form-button">
                                                    <input type="submit" name="signup" id="signup" class="form-submit" value="Save"/>
                                                    <input type="submit" name="reset" id="reset" class="form-submit" value="Reset"/>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="signup-image">
                                            <figure><img src="../assets/Images/signup-image.jpg" alt="sing up image"></figure>
                                            
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
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