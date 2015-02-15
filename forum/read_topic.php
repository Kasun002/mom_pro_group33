<?php
//This page display a topic
include('config.php');
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $dn1 = mysql_fetch_array(mysql_query('select count(t.id) as nb1, t.title, t.parent, count(t2.id) as nb2, c.name from topics as t, topics as t2, categories as c where t.id="' . $id . '" and t.id2=1 and t2.id="' . $id . '" and c.id=t.parent group by t.id'));
    if ($dn1['nb1'] > 0) {
        ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />

                <link href="css/bootstrap.min.css" rel="stylesheet">
                    <link href="css/agency.css" rel="stylesheet">
                        <script language="javascript" type="text/javascript"></script>
                        <title><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> - Forum</title>
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
                                if (isset($_SESSION['username'])) {
                                    $nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="' . $_SESSION['userid'] . '" and user1read="no") or (user2="' . $_SESSION['userid'] . '" and user2read="no")) and id2="1"'));
                                    $nb_new_pm = $nb_new_pm['nb_new_pm'];
                                    ?>
                                    <div class="breadcrumb">
                                        <div class="box_left">
                                            <a href="<?php echo $url_home; ?>">Forum Home</a> &gt; <a href="list_topics.php?parent=<?php echo $dn1['parent']; ?>"><?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; <a href="read_topic.php?id=<?php echo $id; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; Read the topic
                                        </div>
                                        <div class="box_right">
                                            (<a href="login.php">Logout</a>)
                                        </div>
                                        <div class="clean"></div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="breadcrumb">
                                        <div class="box_left">
                                            <a href="<?php echo $url_home; ?>">Forum Home</a> &gt; <a href="list_topics.php?parent=<?php echo $dn1['parent']; ?>"><?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; <a href="read_topic.php?id=<?php echo $id; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; Read the topic
                                        </div>
                                        <div class="box_right">
                                            <a href="signup.php">Sign Up</a> - <a href="login.php">Login</a>
                                        </div>
                                        <div class="clean"></div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <h1 class="h2"><?php echo $dn1['title']; ?></h1>
                                <?php
                                if (isset($_SESSION['username'])) {
                                    ?>
                                    <a href="new_reply.php?id=<?php echo $id; ?>" class="btn btn-success">Reply</a>
                                    <?php
                                }
                                $dn2 = mysql_query('select t.id2, t.authorid, t.message, t.timestamp, u.username as author, u.avatar from topics as t, users as u where t.id="' . $id . '" and u.id=t.authorid order by t.timestamp asc');
                                ?>
                                <table class="table table-hover">
                                    <tr>
                                        <th class="author">Author</th>
                                        <th>Message</th>
                                    </tr>
                                    <?php
                                    while ($dnn2 = mysql_fetch_array($dn2)) {
                                        ?>
                                        <tr>
                                            <td class="author center"><?php
                                                if ($dnn2['avatar'] != '') {
                                                    echo '<img src="' . htmlentities($dnn2['avatar']) . '" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
                                                }
                                                ?><br /><a href="profile.php?id=<?php echo $dnn2['authorid']; ?>"><?php echo $dnn2['author']; ?></a></td>
                                            <td class="left"><?php if (isset($_SESSION['username']) and ($_SESSION['username'] == $dnn2['author'] or $_SESSION['username'] == $admin)) { ?><div class="edit"><a href="edit_message.php?id=<?php echo $id; ?>&id2=<?php echo $dnn2['id2']; ?>"><img src="<?php echo $design; ?>/images/edit.png" alt="Edit" /></a></div><?php } ?><div class="date">Date sent: <?php echo date('Y/m/d H:i:s', $dnn2['timestamp']); ?></div>
                                                <div class="clean"></div>
                                                <?php echo $dnn2['message']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                                <?php
                                if (isset($_SESSION['username'])) {
                                    ?>
                                    <a href="new_reply.php?id=<?php echo $id; ?>" class="btn btn-success">Reply</a>
                                    <?php
                                } else {
                                    ?>
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
                        <?php
                    } else {
                        echo '<h2>This topic doesn\'t exist.</h2>';
                    }
                } else {
                    echo '<h2>The ID of this topic is not defined.</h2>';
                }
                ?>