<?php
//This page let display the list of personnal message of an user
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Personal Messages</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/agency.css" rel="stylesheet">
                <script language="javascript" type="text/javascript"></script>
                </head>
                <body class="">

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

                    
                    <div class="container">
                        <?php
                        if (isset($_SESSION['username'])) {
                            $req1 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="' . $_SESSION['userid'] . '" and m1.user1read="no" and users.id=m1.user2) or (m1.user2="' . $_SESSION['userid'] . '" and m1.user2read="no" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
                            $req2 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="' . $_SESSION['userid'] . '" and m1.user1read="yes" and users.id=m1.user2) or (m1.user2="' . $_SESSION['userid'] . '" and m1.user2read="yes" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
                            $nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="' . $_SESSION['userid'] . '" and user1read="no") or (user2="' . $_SESSION['userid'] . '" and user2read="no")) and id2="1"'));
                            $nb_new_pm = $nb_new_pm['nb_new_pm'];
                            ?>
                            <div class="breadcrumb">
                                <div class="box_left">
                                    Messages List
                                </div>
                                <div class="box_right">
                                    <a href="index.php">Forum Home -</a> <a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a>  (<a href="login.php">Logout</a>)
                                </div>
                                <div class="clean"></div>
                            </div>
                            <h2 class="h2">your personal messages</h2>
                            <a class="btn btn-success" href="new_pm.php" class="button">New Personal Message</a><br />
                            <h3 class="breadcrumb">Unread messages(<?php echo intval(mysql_num_rows($req1)); ?>):</h3>
                            <table class="table table-hover">
                                <tr>
                                    <th class="title_cell">Title</th>
                                    <th>Nb. Replies</th>
                                    <th>Participant</th>
                                    <th>Date Sent</th>
                                </tr>
                                <?php
                                while ($dn1 = mysql_fetch_array($req1)) {
                                    ?>
                                    <tr>
                                        <td class="left"><a href="read_pm.php?id=<?php echo $dn1['id']; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                                        <td><?php echo $dn1['reps'] - 1; ?></td>
                                        <td><a href="profile.php?id=<?php echo $dn1['userid']; ?>"><?php echo htmlentities($dn1['username'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                                        <td><?php echo date('d/m/Y H:i:s', $dn1['timestamp']); ?></td>
                                    </tr>
                                    <?php
                                }
                                if (intval(mysql_num_rows($req1)) == 0) {
                                    ?>
                                    <tr>
                                        <td colspan="4" class="center">You have no unread message.</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <br />
                            <h3 class="breadcrumb">Read messages(<?php echo intval(mysql_num_rows($req2)); ?>):</h3>
                            <table class="table table-hover">
                                <tr>
                                    <th class="title_cell">Title</th>
                                    <th>Number of Replies</th>
                                    <th>Participant</th>
                                    <th>Date Sent</th>
                                </tr>
                                <?php
                                while ($dn2 = mysql_fetch_array($req2)) {
                                    ?>
                                    <tr>
                                        <td class="left"><a href="read_pm.php?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                                        <td><?php echo $dn2['reps'] - 1; ?></td>
                                        <td><a href="profile.php?id=<?php echo $dn2['userid']; ?>"><?php echo htmlentities($dn2['username'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                                        <td><?php echo date('d/m/Y H:i:s', $dn2['timestamp']); ?></td>
                                    </tr>
                                    <?php
                                }
                                if (intval(mysql_num_rows($req2)) == 0) {
                                    ?>
                                    <tr>
                                        <td colspan="4" class="center">You have no read message.</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <?php
                        } else {
                            ?>
                            <h2 class="h2">You must be logged to chat</h2>
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
                    </div>

                </body>
                </html>