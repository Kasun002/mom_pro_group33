<?php
//This page display a personnal message
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Read Massage</title>
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
                        if (isset($_GET['id'])) {
                            $id = intval($_GET['id']);
                            $req1 = mysql_query('select title, user1, user2 from pm where id="' . $id . '" and id2="1"');
                            $dn1 = mysql_fetch_array($req1);
                            if (mysql_num_rows($req1) == 1) {
                                if ($dn1['user1'] == $_SESSION['userid'] or $dn1['user2'] == $_SESSION['userid']) {
                                    if ($dn1['user1'] == $_SESSION['userid']) {
                                        mysql_query('update pm set user1read="yes" where id="' . $id . '" and id2="1"');
                                        $user_partic = 2;
                                    } else {
                                        mysql_query('update pm set user2read="yes" where id="' . $id . '" and id2="1"');
                                        $user_partic = 1;
                                    }
                                    $req2 = mysql_query('select pm.timestamp, pm.message, users.id as userid, users.username, users.avatar from pm, users where pm.id="' . $id . '" and users.id=pm.user1 order by pm.id2');
                                    if (isset($_POST['message']) and $_POST['message'] != '') {
                                        $message = $_POST['message'];
                                        if (get_magic_quotes_gpc()) {
                                            $message = stripslashes($message);
                                        }
                                        $message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
                                        if (mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("' . $id . '", "' . (intval(mysql_num_rows($req2)) + 1) . '", "", "' . $_SESSION['userid'] . '", "", "' . $message . '", "' . time() . '", "", "")') and mysql_query('update pm set user' . $user_partic . 'read="yes" where id="' . $id . '" and id2="1"')) {
                                            ?>
                                            <div class="breadcrumb">Your reply has successfully been sent.<br />
                                                <a href="read_pm.php?id=<?php echo $id; ?>">Massage</a></div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="breadcrumb">An error occurred while sending the reply.<br />
                                                <a href="read_pm.php?id=<?php echo $id; ?>">Go to the PM</a></div>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="container">
                                            <?php
                                            if (isset($_SESSION['username'])) {
                                                $nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="' . $_SESSION['userid'] . '" and user1read="no") or (user2="' . $_SESSION['userid'] . '" and user2read="no")) and id2="1"'));
                                                $nb_new_pm = $nb_new_pm['nb_new_pm'];
                                                ?>
                                                <div class="breadcrumb">
                                                    <div class="box_left">
                                                        <a href="list_pm.php">All massages</a> &gt; Massages
                                                    </div>
                                                    <div class="box_right">
                                                        <a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a>  (<a href="login.php">Logout</a>)
                                                    </div>
                                                    <div class="clean"></div>
                                                </div>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="breadcrumb">
                                                    <div class="box_left">
                                                        <a href="list_pm.php">All massages</a> &gt; Massages
                                                    </div>
                                                    <div class="box_right">
                                                        <a href="signup.php">Sign Up</a> - <a href="login.php">Login</a>
                                                    </div>
                                                    <div class="clean"></div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <h1><?php echo $dn1['title']; ?></h1>
                                            <table class="table table-hover">
                                                <tr>
                                                    <th class="author">User</th>
                                                    <th>Message</th>
                                                </tr>
                                                <?php
                                                while ($dn2 = mysql_fetch_array($req2)) {
                                                    ?>
                                                    <tr>
                                                        <td class="author center"><?php
                                                            if ($dn2['avatar'] != '') {
                                                                echo '<img src="' . htmlentities($dn2['avatar']) . '" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
                                                            }
                                                            ?><br /><a href="profile.php?id=<?php echo $dn2['userid']; ?>"><?php echo $dn2['username']; ?></a></td>
                                                        <td class="left"><div class="date">Date sent: <?php echo date('Y/m/d H:i:s', $dn2['timestamp']); ?></div>
                                                            <?php echo $dn2['message']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table><br />
                                            <h2 class="h2">Reply</h2>
                                            <div class="container">
                                                <form action="read_pm.php?id=<?php echo $id; ?>" method="post">
                                                    <label class="text-primary" for="message" class="center">Message</label>
                                                    <textarea class="form-control"cols="40" rows="6" name="message" id="message"></textarea><br />
                                                    <input class="btn btn-success"type="submit" value="Send" />
                                                </form>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    echo '<div class="message">You don\'t have the right to access this page.</div>';
                                }
                            } else {
                                echo '<div class="message">This message doesn\'t exist.</div>';
                            }
                        } else {
                            echo '<div class="message">The ID of this message is not defined.</div>';
                        }
                    } else {
                        ?>
                        <div class="message">You must be logged to reply</div>
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