<?php
//This page let display the list of topics of a category
include('config.php');
if (isset($_GET['parent'])) {
    $id = intval($_GET['parent']);
    $dn1 = mysql_fetch_array(mysql_query('select count(c.id) as nb1, c.name,count(t.id) as topics from categories as c left join topics as t on t.parent="' . $id . '" where c.id="' . $id . '" group by c.id'));
    if ($dn1['nb1'] > 0) {
        ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
                <title><?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> - Forum</title>

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
                                if (isset($_SESSION['username'])) {
                                    $nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="' . $_SESSION['userid'] . '" and user1read="no") or (user2="' . $_SESSION['userid'] . '" and user2read="no")) and id2="1"'));
                                    $nb_new_pm = $nb_new_pm['nb_new_pm'];
                                    ?>
                                    <div class="breadcrumb">
                                        <div class="box_left">
                                            <a class="breadcrumb" href="<?php echo $url_home; ?>">Forum Home</a> &gt; <a href="list_topics.php?parent=<?php echo $id; ?>"><?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?></a>
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
                                            <a  class="breadcrumb"href="<?php echo $url_home; ?>">Forum Home</a> &gt; <a href="list_topics.php?parent=<?php echo $id; ?>"><?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?></a>
                                        </div>
                                        <div class="box_right">
                                            <a  class="breadcrumb" href="signup.php">Sign Up</a> - <a href="login.php">Login</a>
                                        </div>
                                        <div class="clean"></div>
                                    </div>
                                    <?php
                                }
                                if (isset($_SESSION['username'])) {
                                    ?>
                                    <a  href="new_topic.php?parent=<?php echo $id; ?>" class="btn btn-success">New Topic</a>
                                    <?php
                                }
                                $dn2 = mysql_query('select t.id, t.title, t.authorid, u.username as author, count(r.id) as replies from topics as t left join topics as r on r.parent="' . $id . '" and r.id=t.id and r.id2!=1  left join users as u on u.id=t.authorid where t.parent="' . $id . '" and t.id2=1 group by t.id order by t.timestamp2 desc');
                                if (mysql_num_rows($dn2) > 0) {
                                    ?>
                                    <table class="table table-hover">
                                        <tr>
                                            <th class="forum_tops">Topic</th>
                                            <th class="forum_auth">Author</th>
                                            <th class="forum_nrep">Replies</th>
                                            <?php
                                            if (isset($_SESSION['username']) and $_SESSION['username'] == $admin) {
                                                ?>
                                                <th class="forum_act">Action</th>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                        while ($dnn2 = mysql_fetch_array($dn2)) {
                                            ?>
                                            <tr>
                                                <td class="forum_tops"><a href="read_topic.php?id=<?php echo $dnn2['id']; ?>"><?php echo htmlentities($dnn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                                                <td><a href="profile.php?id=<?php echo $dnn2['authorid']; ?>"><?php echo htmlentities($dnn2['author'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                                                <td><?php echo $dnn2['replies']; ?></td>
                                                <?php
                                                if (isset($_SESSION['username']) and $_SESSION['username'] == $admin) {
                                                    ?>
                                                    <td><a href="delete_topic.php?id=<?php echo $dnn2['id']; ?>"><img src="<?php echo $design; ?>/images/delete.png" alt="Delete" /></a></td>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                    <?php
                                } else {
                                    ?>
                                    <div class="breadcrumb" align="center" >This category has no topic.</div>
                                    <?php
                                }
                                if (isset($_SESSION['username'])) {
                                    ?>
                                    <a href="new_topic.php?parent=<?php echo $id; ?>" class="btn btn-success">New Topic</a>
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
                        echo '<h2>This category doesn\'t exist.</h2>';
                    }
                } else {
                    echo '<h2>The ID of the category you want to visit is not defined.</h2>';
                }
                ?>