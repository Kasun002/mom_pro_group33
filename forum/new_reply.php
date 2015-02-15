<?php
//This page let reply to a topic
include('config.php');
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if (isset($_SESSION['username'])) {
        $dn1 = mysql_fetch_array(mysql_query('select count(t.id) as nb1, t.title, t.parent, c.name from topics as t, categories as c where t.id="' . $id . '" and t.id2=1 and c.id=t.parent group by t.id'));
        if ($dn1['nb1'] > 0) {
            ?>
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
                    <title>Add a reply - <?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> - Forum</title>
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
                                            <a href="<?php echo $url_home; ?>">Forum Home</a> &gt; <a href="list_topics.php?parent=<?php echo $dn1['parent']; ?>"><?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; <a href="read_topic.php?id=<?php echo $id; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; Add a reply
                                        </div>
                                        <div class="box_right">
                                            (<a href="login.php">Logout</a>)
                                        </div>
                                        <div class="clean"></div>
                                    </div>
                                    <?php
                                    if (isset($_POST['message']) and $_POST['message'] != '') {
                                        include('bbcode_function.php');
                                        $message = $_POST['message'];
                                        if (get_magic_quotes_gpc()) {
                                            $message = stripslashes($message);
                                        }
                                        $message = mysql_real_escape_string(bbcode_to_html($message));
                                        if (mysql_query('insert into topics (parent, id, id2, title, message, authorid, timestamp, timestamp2) select "' . $dn1['parent'] . '", "' . $id . '", max(id2)+1, "", "' . $message . '", "' . $_SESSION['userid'] . '", "' . time() . '", "' . time() . '" from topics where id="' . $id . '"') and mysql_query('update topics set timestamp2="' . time() . '" where id="' . $id . '" and id2=1')) {
                                            ?>
                                            <div class="breadcrumb" align="center">The message have successfully been sent.<br />
                                                <a href="read_topic.php?id=<?php echo $id; ?>">Forum Home</a></div>
                                            <?php
                                        } else {
                                            echo 'An error occurred while sending the message.';
                                        }
                                    } else {
                                        ?>
                                        <form action="new_reply.php?id=<?php echo $id; ?>" method="post">
                                            <label class="text-primary" for="message">Message</label><br />
                                            <div class="message_buttons">
                                                <input class="btn btn-default"type="button" value="Bold" onclick="javascript:insert('[b]', '[/b]', 'message');" /><!--
                                                --><input class="btn btn-default"type="button" value="Italic" onclick="javascript:insert('[i]', '[/i]', 'message');" /><!--
                                                --><input class="btn btn-default"type="button" value="Underlined" onclick="javascript:insert('[u]', '[/u]', 'message');" /><!--
                                                --><input class="btn btn-default"type="button" value="Link" onclick="javascript:insert('[url]', '[/url]', 'message');" /><!--
                                                --><input class="btn btn-default"type="button" value="Left" onclick="javascript:insert('[left]', '[/left]', 'message');" /><!--
                                                --><input class="btn btn-default"type="button" value="Center" onclick="javascript:insert('[center]', '[/center]', 'message');" /><!--
                                                --><input class="btn btn-default"type="button" value="Right" onclick="javascript:insert('[right]', '[/right]', 'message');" />
                                            </div>
                                            <textarea class="form-control"name="message" id="message" cols="70" rows="6"></textarea><br />
                                            <input class="btn-success"type="submit" value="Send" />
                                        </form>
                                        <?php
                                    }
                                    ?>
                                </div>

                            </body>
                            </html>
                            <?php
                        } else {
                            echo '<h2>The topic you want to reply doesn\'t exist.</h2>';
                        }
                    } else {
                        ?>
                        <h2 class="h1">You must be log to reply</h2>
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
                    echo '<h2>The ID of the topic you want to reply is not defined.</h2>';
                }
                ?>