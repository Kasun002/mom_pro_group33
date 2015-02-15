<?php
//This page display the profile of an user
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Profile of an user</title>
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
                                    <a href="<?php echo $url_home; ?>">Forum Home</a> &gt; <a href="users.php">Liste des utilisateurs</a> &gt; Profile of user
                                </div>
                                <div class="box_right">
                                    <a href="profile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a> (<a href="login.php">Logout</a>)
                                </div>
                                <div class="clean"></div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="breadcrumb">
                                <div class="box_left">
                                    <a href="<?php echo $url_home; ?>">Forum Home</a> &gt; <a href="users.php">User Details</a> &gt; Profile of
                                </div>
                                <div class="box_right">
                                    <a href="signup.php">Sign Up</a> - <a href="login.php">Login</a>
                                </div>
                                <div class="clean"></div>
                            </div>
                            <?php
                        }
                        if (isset($_GET['id'])) {
                            $id = intval($_GET['id']);
                            $dn = mysql_query('select username, email, avatar, signup_date from users where id="' . $id . '"');
                            if (mysql_num_rows($dn) > 0) {
                                $dnn = mysql_fetch_array($dn);
                                ?>
                                This is the profile of "<?php echo htmlentities($dnn['username']); ?>" :
                                <?php
                                if ($_SESSION['userid'] == $id) {
                                    ?>

                                    <?php
                                }
                                ?>
                                <table style="width:500px;" class="table table-hover">
                                    <tr>
                                        <td><?php
                                            if ($dnn['avatar'] != '') {
                                                echo '<img src="' . htmlentities($dnn['avatar'], ENT_QUOTES, 'UTF-8') . '" alt="Avatar" style="max-width:100px;max-height:100px;" />';
                                            } else {
                                                //echo 'This user has no avatar.';
                                            }
                                            ?></td>
                                        <td class="left"><h1><?php echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8'); ?></h1>
                                            Email: <?php echo htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8'); ?><br />
                                            This user joined the website on <?php echo date('Y/m/d', $dnn['signup_date']); ?></td>
                                    </tr>
                                </table>
                                <?php
                                if (isset($_SESSION['username']) and $_SESSION['username'] != $dnn['username']) {
                                    ?>

                                    <?php
                                }
                            } else {
                                echo 'This user doesn\'t exist.';
                            }
                        } else {
                            echo 'The ID of this user is not defined.';
                        }
                        ?>
                    </div>

                </body>
                </html>