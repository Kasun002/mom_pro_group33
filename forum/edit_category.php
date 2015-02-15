<?php
//This page let an administrator edit a category
include('config.php');
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $dn1 = mysql_fetch_array(mysql_query('select count(id) as nb1, name, description from categories where id="' . $id . '" group by id'));
    if ($dn1['nb1'] > 0) {
        if (isset($_SESSION['username']) and $_SESSION['username'] == $admin) {
            ?>
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />

                    <link href="css/bootstrap.min.css" rel="stylesheet">
                        <link href="css/agency.css" rel="stylesheet">
                            <script language="javascript" type="text/javascript"></script>

                            <title>Edit a category - <?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> - Forum</title>
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
                                            <a href="<?php echo $url_home; ?>">Forum Home</a> &gt; <?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> &gt; Edit the category
                                        </div>
                                        <div class="box_right">
                                             (<a href="login.php">Logout</a>)
                                        </div>
                                        <div class="clean"></div>
                                    </div>
                                    <?php
                                    if (isset($_POST['name'], $_POST['description']) and $_POST['name'] != '') {
                                        $name = $_POST['name'];
                                        $description = $_POST['description'];
                                        if (get_magic_quotes_gpc()) {
                                            $name = stripslashes($name);
                                            $description = stripslashes($description);
                                        }
                                        $name = mysql_real_escape_string($name);
                                        $description = mysql_real_escape_string($description);
                                        if (mysql_query('update categories set name="' . $name . '", description="' . $description . '" where id="' . $id . '"')) {
                                            ?>
                                            <div class="message">The category have successfully been edited..<br />
                                                <a href="<?php echo $url_home; ?>">Forum Home</a></div>
                                            <?php
                                        } else {
                                            echo 'An error occured while editing the category.';
                                        }
                                    } else {
                                        ?>
                                        <form action="edit_category.php?id=<?php echo $id; ?>" method="post">
                                            <label class="text-primary"for="name">Name</label><input class="form-control"type="text" name="name" id="name" value="<?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?>" /><br />
                                            <label class="text-primary" for="description">Description</label>(html enabled)<br />
                                            <textarea class="form-control"name="description" id="description" cols="70" rows="6"><?php echo htmlentities($dn1['description'], ENT_QUOTES, 'UTF-8'); ?></textarea><br />
                                            <input class="btn btn-success"type="submit" value="Edit" />
                                        </form>
                                        <?php
                                    }
                                    ?>
                                </div>

                            </body>
                            </html>
                            <?php
                        } else {
                            echo '<h2>You must be logged as an administrator to access this page: <a href="login.php">Login</a> - <a href="signup.php">Sign Up</a></h2>';
                        }
                    } else {
                        echo '<h2>The category you want to edit doesn\'t exist..</h2>';
                    }
                } else {
                    echo '<h2>The ID of the category you want to edit is not defined.</h2>';
                }
                ?>