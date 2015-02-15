<?php
//This page let delete a topic
include('config.php');
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if (isset($_SESSION['username'])) {
        $dn1 = mysql_fetch_array(mysql_query('select count(t.id) as nb1, t.title, t.parent, c.name from topics as t, categories as c where t.id="' . $id . '" and t.id2=1 and c.id=t.parent group by t.id'));
        if ($dn1['nb1'] > 0) {
            if ($_SESSION['username'] == $admin) {
                ?>
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />

                        <link href="css/bootstrap.min.css" rel="stylesheet">
                            <link href="css/agency.css" rel="stylesheet">
                                <script language="javascript" type="text/javascript"></script>
                                <title>Delete a topic - <?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> - Forum</title>
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

                                    
                                    <div class="container">
                                        <?php
                                        $nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="' . $_SESSION['userid'] . '" and user1read="no") or (user2="' . $_SESSION['userid'] . '" and user2read="no")) and id2="1"'));
                                        $nb_new_pm = $nb_new_pm['nb_new_pm'];
                                        ?>
                                        <div class="breadcrumb">
                                            <div class="box_left">
                                                <a href="<?php echo $url_home; ?>">Forum Home</a> &gt; <a href="list_topics.php?parent=<?php echo $dn1['parent']; ?>"><?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; <a href="read_topic.php?id=<?php echo $id; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; Delete the topic
                                            </div>
                                            <div class="box_right">
                                                <a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a>  (<a href="login.php">Logout</a>)
                                            </div>
                                            <div class="clean"></div>
                                        </div>
                                        <?php
                                        if (isset($_POST['confirm'])) {
                                            if (mysql_query('delete from topics where id="' . $id . '"')) {
                                                ?>
                                                <div class="breadcrumb" align="center" class="message">The topic have successfully been deleted.<br />
                                                    <a href="list_topics.php?parent=<?php echo $dn1['parent']; ?>">Go to "<?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?>"</a></div>
                                                <?php
                                            } else {
                                                echo 'An error occured while deleting the topic.';
                                            }
                                        } else {
                                            ?>
                                            <form class="breadcrumb"action="delete_topic.php?id=<?php echo $id; ?>" method="post">
                                                <div align="center">    
                                                    <h2 class="h2">Are you sure you want to delete this topic?</h2>
                                                    <input class="btn btn-success"type="hidden" name="confirm" value="true" />
                                                    <input class="btn btn-success"type="submit" value="Yes" /> 
                                                </div>
                                            </form>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                </body>
                                </html>
                                <?php
                            } else {
                                echo '<h2>You don\'t have the right to delete this topic.</h2>';
                            }
                        } else {
                            echo '<h2>The topic you want to delete doesn\'t exist.</h2>';
                        }
                    } else {
                        echo '<h2>You must be logged as an administrator to access this page: <a href="login.php">Login</a> - <a href="signup.php">Sign Up</a></h2>';
                    }
                } else {
                    echo '<h2>The ID of the topic you want to delete is not defined.</h2>';
                }
                ?>