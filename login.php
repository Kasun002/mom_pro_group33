<?php

include 'config/db.php';
include 'user/user.php';

session_start();

$user = new user();

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pswrd = md5($_POST['pswrd']);
    
    $query = "SELECT user_id from users WHERE email='$email' and pswrd='$pswrd'"; 
    $check = mysql_query($query);
    $user_data = mysql_fetch_array($check);
    
    $count_row = mysql_num_rows($check);

    if ($count_row != 0) {
        
        $user->loginSession();
        
        $_SESSION['email'] = $email;
        $userType = $user->getUserType($email);
        $superUser = "Doctor";

        if ($userType == $superUser) {
            header("location:Event/index.php");
        } else {
            
           
            
            header("location:profile.php");
        }
        
    } else {
        header("location:login.php");
        $_SESSION['loginError'] = "Incorrect User name or Password, ";
        
    }
    
}




//
//if (isset($_POST['submit'])) {
//
//    $checkLogin = new user();
//
//    $email = $_POST['email'];
//    $ps = $_POST['pswrd'];
//
//    if ($checkLogin->login($email, $ps)) {
//
//        session_start();
//        $_SESSION['login'] = true;
//        header("location:profile.php");
//    } else {
//        ?><p class="text-danger"> Invalid Email or Password </p> <?php
//    }
//}
?>


<html>

    <head>


        <title>MomprO</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/agency.css" rel="stylesheet">

        <script language="javascript" type="text/javascript"></script>

    </head>

    <body>

        <img src="images/header.jpg" width="1300" hight="400">



        <div class="container">

            <div class="col-lg-4"></div>

            <div class="col-lg-4">

                <h4><p class="text-danger"><?php echo $_SESSION['loginError']; ?></p></h4>

                <form action="" method="POST" name="login">
                    <div class="form-group">
                        <label for="inputEmail"><p class="text-primary"><em>Email</em></p></label>
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword"><p class="text-primary"><em>Password</em></p></label>
                        <input type="password" class="form-control" placeholder="Password" name = "pswrd">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"><p class="text-primary"><em>Remember me</em></p></label>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    <a href="#">    Forgot My Password</a>

                </form>
                <p></p>
                <p>Are you have a Mompro account ?</p>
                <div class="btn-group btn-group-justified">
                    <a href="registration.php" class="btn btn-primary">Create New Account</a>
                </div>



            </div>

            <div class="col-lg-4"></div>
        </div>
    </body>
</html>