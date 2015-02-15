<?php
//This page let create a new personnal message
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>New Massage</title>
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

                    
                    <?php
                    if (isset($_SESSION['username'])) {
                        $form = true;
                        $otitle = '';
                        $orecip = '';
                        $omessage = '';
                        if (isset($_POST['title'], $_POST['recip'], $_POST['message'])) {
                            $otitle = $_POST['title'];
                            $orecip = $_POST['recip'];
                            $omessage = $_POST['message'];
                            if (get_magic_quotes_gpc()) {
                                $otitle = stripslashes($otitle);
                                $orecip = stripslashes($orecip);
                                $omessage = stripslashes($omessage);
                            }
                            if ($_POST['title'] != '' and $_POST['recip'] != '' and $_POST['message'] != '') {
                                $title = mysql_real_escape_string($otitle);
                                $recip = mysql_real_escape_string($orecip);
                                $message = mysql_real_escape_string(nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
                                $dn1 = mysql_fetch_array(mysql_query('select count(id) as recip, id as recipid, (select count(*) from pm) as npm from users where username="' . $recip . '"'));
                                if ($dn1['recip'] == 1) {
                                    if ($dn1['recipid'] != $_SESSION['userid']) {
                                        $id = $dn1['npm'] + 1;
                                        if (mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("' . $id . '", "1", "' . $title . '", "' . $_SESSION['userid'] . '", "' . $dn1['recipid'] . '", "' . $message . '", "' . time() . '", "yes", "no")')) {
                                            ?>
                                            <div class="breadcrumb" align="center">The PM have successfully been sent.<br />
                                                <a href="list_pm.php">View all massages</a></div>
                                            <?php
                                            $form = false;
                                        } else {
                                            $error = 'An error occurred while sending the PM.';
                                        }
                                    } else {
                                        $error = 'You cannot send a PM to yourself.';
                                    }
                                } else {
                                    $error = 'The recipient of your PM doesn\'t exist.';
                                }
                            } else {
                                $error = 'A field is not filled.';
                            }
                        } elseif (isset($_GET['recip'])) {
                            $orecip = $_GET['recip'];
                        }
                        if ($form) {
                            if (isset($error)) {
                                echo '<div class="message">' . $error . '</div>';
                            }
                            ?>
                            <div class="container">
                                <?php
                                $nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="' . $_SESSION['userid'] . '" and user1read="no") or (user2="' . $_SESSION['userid'] . '" and user2read="no")) and id2="1"'));
                                $nb_new_pm = $nb_new_pm['nb_new_pm'];
                                ?>
                                <div class="breadcrumb">
                                    <div class="box_left">
                                        <a href="list_pm.php">List of Massages</a> &gt; New PM
                                    </div>
                                    <div class="box_right">
                                        <a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a> (<a href="login.php">Logout</a>)
                                    </div>
                                    <div class="clean"></div>
                                </div>
                                <h1 class="h3">New Message</h1>
                                <form action="new_pm.php" method="post">

                                    <label class="text-primary"for="title">Subject</label><input class="form-control" type="text" value="<?php echo htmlentities($otitle, ENT_QUOTES, 'UTF-8'); ?>" id="title" name="title" /><br />
                                    <label class="text-primary"for="recip">Sender name<span class="small">(Username)</span></label><input class="form-control"type="text" value="<?php echo htmlentities($orecip, ENT_QUOTES, 'UTF-8'); ?>" id="recip" name="recip" /><br />
                                    <label class="text-primary"for="message">Message</label><textarea class="form-control"cols="40" rows="5" id="message" name="message"><?php echo htmlentities($omessage, ENT_QUOTES, 'UTF-8'); ?></textarea><br />
                                    <input class="btn btn-success"type="submit" value="Send" />
                                </form>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="h3">You must be logged to chat</div>
                        <div class="container">
                            <form action="login.php" method="post">
                                <div align="center" class="form-group">
                                    <label for="username" class="text-primary" >Username</label><input class="form-control" type="text" name="username" id="username" /><br />
                                    <label for="password"class="text-primary" >Password</label><input  class="form-control"type="password" name="password" id="password" /><br />
                                </div>
                                <div class="center">
                                    <input type="submit" value="Login" class="btn btn-success"/>
                                </div>


                            </form>
                        </div>
                        <?php
                    }
                    ?>

                </body>
                </html>