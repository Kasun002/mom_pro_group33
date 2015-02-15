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
?>
