<?php
    $emptyArray=[];
    if(isset($_GET["error"]))
        $emptyArray=explode(',',$_GET["error"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data" action="registerusercontroller.php">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                                <span style="color:red"> <?php if(in_array("username",$emptyArray))echo " It's Required";?></span>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                                <span style="color:red"> <?php if(in_array("email",$emptyArray))echo " It's Required";?></span>

                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                                <span style="color:red"> <?php if(in_array("password",$emptyArray))echo " It's Required";?></span>

                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                                <span style="color:red"><?php if(in_array("repeat_password",$emptyArray)) echo "repeat your password"?></span>
                                
                            </div>

                            <div class="form-group">
                                

                                <select name="number" id="number" style="width=100px">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    
                                </select>
                            </div>

                            <div class="form-group">
                                
                                <input type="text" name="Ext" id="Ext" placeholder="Ext"/>
                                <span style="color:red"> <?php if(in_array("ext",$emptyArray))echo " It's Required";?></span>

                            </div>
                  
                            
                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                    
                                    <input type="file" name="imgFile">
                                    <span style="color:red"> <?php if(in_array("img",$emptyArray))echo " It's Required";?></span>

                                    </div>
                                   
                                </div>
                               

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                                <input type="reset" name="reset" id="reset" class="form-submit" value="reset"/>
                            </div>

                           
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        
                    </div>
                </div>
            </div>
        </section>

       
      

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>