<?php
//This page let an user edit a message
include('config.php');
if (isset($_GET['id'], $_GET['id2'])) {
    $id = intval($_GET['id']);
    $id2 = intval($_GET['id2']);
    if (isset($_SESSION['username'])) {
        $dn1 = mysql_fetch_array(mysql_query('select count(t.id) as nb1, t.authorid, t2.title, t.message, t.parent, c.name from topics as t, topics as t2, categories as c where t.id="' . $id . '" and t.id2="' . $id2 . '" and t2.id="' . $id . '" and t2.id2=1 and c.id=t.parent group by t.id'));
        if ($dn1['nb1'] > 0) {
            if ($_SESSION['userid'] == $dn1['authorid'] or $_SESSION['username'] == $admin) {
                include('bbcode_function.php');
                ?>
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
                        <title>Edit a reply - <?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> - Forum</title>
                        <script type="text/javascript" src="functions.js"></script>
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
                                    
                                    <div class="container">
                                        <?php
                                        $nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="' . $_SESSION['userid'] . '" and user1read="no") or (user2="' . $_SESSION['userid'] . '" and user2read="no")) and id2="1"'));
                                        $nb_new_pm = $nb_new_pm['nb_new_pm'];
                                        ?>
                                        <div class="breadcrumb">
                                            <div class="box_left">
                                                <a href="<?php echo $url_home; ?>">Forum Home</a> &gt; <a href="list_topics.php?parent=<?php echo $dn1['parent']; ?>"><?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; <a href="read_topic.php?id=<?php echo $id; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; Edit a reply
                                            </div>
                                            <div class="box_right">
                                                <a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a>(<a href="login.php">Logout</a>)
                                            </div>
                                            <div class="clean"></div>
                                        </div>
                                        <?php
                                        if (isset($_POST['message']) and $_POST['message'] != '') {
                                            if ($id2 == 1) {
                                                if ($_SESSION['username'] == $admin and isset($_POST['title']) and $_POST['title'] != '') {
                                                    $title = $_POST['title'];
                                                    if (get_magic_quotes_gpc()) {
                                                        $title = stripslashes($title);
                                                    }
                                                    $title = mysql_real_escape_string($dn1['title']);
                                                } else {
                                                    $title = mysql_real_escape_string($dn1['title']);
                                                }
                                            } else {
                                                $title = '';
                                            }
                                            $message = $_POST['message'];
                                            if (get_magic_quotes_gpc()) {
                                                $message = stripslashes($message);
                                            }
                                            $message = mysql_real_escape_string(bbcode_to_html($message));
                                            if (mysql_query('update topics set title="' . $title . '", message="' . $message . '" where id="' . $id . '" and id2="' . $id2 . '"')) {
                                                ?>
                                                <div class="message">The message have successfully been edited.<br />
                                                    <a href="read_topic.php?id=<?php echo $id; ?>">Go the the topic</a></div>
                                                <?php
                                            } else {
                                                echo 'An error occurred while editing the message.';
                                            }
                                        } else {
                                            ?>
                                            <form class="container"action="edit_message.php?id=<?php echo $id; ?>&id2=<?php echo $id2; ?>" method="post">
                                                <?php
                                                if ($_SESSION['username'] == $admin and $id2 == 1) {
                                                    ?>
                                                    <label class="text-primary" for="title">Title</label><input type="text" name="title" id="title" value="<?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?>" />
                                                    <?php
                                                }
                                                ?>
                                                <label class="text-primary"for="message">Message</label><br />
                                                <div class="message_buttons">
                                                    <input class="btn btn-default"type="button" value="Bold" onclick="javascript:insert('[b]', '[/b]', 'message');" /><!--
                                                    --><input class="btn btn-default"type="button" value="Italic" onclick="javascript:insert('[i]', '[/i]', 'message');" /><!--
                                                    --><input class="btn btn-default"type="button" value="Underlined" onclick="javascript:insert('[u]', '[/u]', 'message');" /><!--
                                                    --><input class="btn btn-default"type="button" value="Image" onclick="javascript:insert('[img]', '[/img]', 'message');" /><!--
                                                    --><input class="btn btn-default"type="button" value="Link" onclick="javascript:insert('[url]', '[/url]', 'message');" /><!--
                                                    --><input class="btn btn-default"type="button" value="Left" onclick="javascript:insert('[left]', '[/left]', 'message');" /><!--
                                                    --><input class="btn btn-default"type="button" value="Center" onclick="javascript:insert('[center]', '[/center]', 'message');" /><!--
                                                    --><input class="btn btn-default"type="button" value="Right" onclick="javascript:insert('[right]', '[/right]', 'message');" />
                                                </div>
                                                <textarea class="form-control"name="message" id="message" cols="70" rows="6"><?php echo html_to_bbcode($dn1['message']); ?></textarea><br />
                                                <input class="btn btn-success"type="submit" value="Submit" />
                                            </form>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                </body>
                                </html>
                                <?php
                            } else {
                                echo '<h2>You don\'t have the right to edit this message.</h2>';
                            }
                        } else {
                            echo '<h2>The message you want to edit doesn\'t exist..</h2>';
                        }
                    } else {
                        ?>
                        <h2>You must be logged to access this page:</h2>
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
                } else {
                    echo '<h2>The ID of the message you want to edit is not defined.</h2>';
                }
                ?>