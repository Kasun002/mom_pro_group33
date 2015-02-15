<?php
//This page let users sign up
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Sign Up</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/agency.css" rel="stylesheet">
                <script language="javascript" type="text/javascript"></script>
                </head>
                <body class="col-lg-12">

                    <div class="container">
                        <p></p>
                        <ul class="nav nav-tabs">

                            <li><a href="../profile.php"><span class="glyphicon glyphicon-user"> MyProfile</span></a></li>
                            <li class="active"><a href="forum/index.php"><span class="glyphicon glyphicon-envelope"> Forum</span></a></li>
                            <li><a href="../appoinment/mother_view.php"><span class="glyphicon glyphicon-briefcase"> Appointment</span></a></li>
                            <li><a href="../Event/scheduleMotheView.php"><span class="glyphicon glyphicon-bell"> Schedule</span></a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-bell"> Report Analyzer</span></a></li>
                            <li><a href="../Track/track.php"><span class="glyphicon glyphicon-bell"> Tracker</span></a></li>
                            <li><a href="../contactus.php"><span class="glyphicon glyphicon-bell"> ContactUs</span></a></li>
                            <li><a href="../aboutus.php"><span class="glyphicon glyphicon-user"> AboutUs</span></a></li>
                            <a href="../index.php"><button class="btn btn-primary" >Logout</button></a>


                        </ul>

                    </div>
                    <div class="h1" align="center">
                        <a class="h1" href="index.php" />MOM PRO Discussion Forum</a>
                    </div> 
                    <?php
                    if (isset($_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email'], $_POST['avatar']) and $_POST['username'] != '') {
                        if (get_magic_quotes_gpc()) {
                            $_POST['username'] = stripslashes($_POST['username']);
                            $_POST['password'] = stripslashes($_POST['password']);
                            $_POST['passverif'] = stripslashes($_POST['passverif']);
                            $_POST['email'] = stripslashes($_POST['email']);
                            $_POST['avatar'] = stripslashes($_POST['avatar']);
                        }
                        if ($_POST['password'] == $_POST['passverif']) {
                            if (strlen($_POST['password']) >= 6) {
                                if (preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i', $_POST['email'])) {
                                    $username = mysql_real_escape_string($_POST['username']);
                                    $password = mysql_real_escape_string(sha1($_POST['password']));
                                    $email = mysql_real_escape_string($_POST['email']);
                                    $avatar = mysql_real_escape_string($_POST['avatar']);
                                    $dn = mysql_num_rows(mysql_query('select id from users where username="' . $username . '"'));
                                    if ($dn == 0) {
                                        $dn2 = mysql_num_rows(mysql_query('select id from users'));
                                        $id = $dn2 + 1;
                                        if (mysql_query('insert into users(id, username, password, email, avatar, signup_date) values (' . $id . ', "' . $username . '", "' . $password . '", "' . $email . '", "' . $avatar . '", "' . time() . '")')) {
                                            $form = false;
                                            ?>
                                            <div class="message">You have successfully been signed up. You can now log in.<br />
                                                <a href="login.php">Log in</a></div>
                                            <?php
                                        } else {
                                            $form = true;
                                            $message = 'An error occurred while signing you up.';
                                        }
                                    } else {
                                        $form = true;
                                        $message = 'Another user already use this username.';
                                    }
                                } else {
                                    $form = true;
                                    $message = 'The email you typed is not valid.';
                                }
                            } else {
                                $form = true;
                                $message = 'Your password must have a minimum of 6 characters.';
                            }
                        } else {
                            $form = true;
                            $message = 'The passwords you entered are not identical.';
                        }
                    } else {
                        $form = true;
                    }
                    if ($form) {
                        if (isset($message)) {
                            echo '<div class="message">' . $message . '</div>';
                        }
                        ?>
                        <div class="container">
                            <div class="breadcrumb">
                                <div class="box_left">
                                    <a href="<?php echo $url_home; ?>">Forum Home</a> &gt; Sign Up
                                </div>
                                <div class="box_right">
                                    <a href="signup.php">Sign Up</a> - <a href="login.php">Login</a>
                                </div>
                                <div class="clean"></div>
                            </div>
                            <form class="form-group"action="signup.php" method="post">
                                <h2 align="center"class="h2">Please fill this form to sign up</h2><br />
                                <div class="left">
                                    <label class="text-primary"for="username">Username</label><input align="middle"class="form-control" type="text" name="username" value="<?php
                                    if (isset($_POST['username'])) {
                                        echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
                                    }
                                    ?>" />
                                    <label class="text-primary"for="password">Password<span class="small">(6 characters min.)</span></label><input align="middle" class="form-control" type="password" name="password" /><br />
                                    <label class="text-primary"for="passverif">Password<span class="small">(verification)</span></label><input align="middle"class="form-control"type="password" name="passverif" /><br />
                                    <label class="text-primary"for="email">Email</label><input align="middle"class="form-control"type="text" name="email" value="<?php
                                    if (isset($_POST['email'])) {
                                        echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
                                    }
                                    ?>" /><br />
                                    <label for="avatar">Avatar<span class="small">(optional)</span></label><input type="text" name="avatar" value="<?php if (isset($_POST['avatar'])) {
                                        echo htmlentities($_POST['avatar'], ENT_QUOTES, 'UTF-8');
                                    } ?>" /><br />

                                    <input class="btn btn-success"type="submit" value="Sign Up" />
                                </div>
                            </form>
                        </div>
    <?php
}
?>

                </body>
                </html>