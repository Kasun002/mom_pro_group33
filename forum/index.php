<?php
//This page displays the list of the forum's categories
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/agency.css" rel="stylesheet">
        <script language="javascript" type="text/javascript"></script>
        <title>Forum</title>
    </head>
    <body>
         <div class="container">
            <p></p>
            <ul class="nav nav-tabs">
                
                <li><a href="../profile.php"><span class="glyphicon glyphicon-user"> MyProfile</span></a></li>
                <li class="active"><a href="forum/index.php"><span class="glyphicon glyphicon-envelope"> Forum</span></a></li>
                <li><a href="../appoinment/mother_view.php"><span class="glyphicon glyphicon-briefcase"> Appointment</span></a></li>
                <li><a href="../Event/scheduleMotheView.php"><span class="glyphicon glyphicon-bell"> Schedule</span></a></li>
                <li><a href="../report/graph_inputs2.php"><span class="glyphicon glyphicon-bell"> Report Analyzer</span></a></li>
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
                        <a href="../admin.php">Home ></a><a href="<?php echo $url_home; ?>" class="breadcrumb">Forum Home</a>
                    </div>
                    <div class="box_right">
                         <a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a> (<a href="login.php">Logout</a>)
                    </div>
                    <div class="clean"></div>
                </div>
                <?php
            } else {
                ?>
                <div class="breadcrumb">
                    <div class="box_left">
                        <a href="<?php echo $url_home; ?>">Forum Home</a>
                    </div>
                    <div class="box_right">
                        
                    </div>
                    <div class="clean"></div>
                </div>
                <?php
            }
            if (isset($_SESSION['username']) and $_SESSION['username'] == $admin) {
                ?>
                <a href="new_category.php" class="btn btn-success">New Category</a>
                <?php
            }
            ?>
            <table class="table table-hover">
                <tr>
                    <th class="forum_cat">Category</th>
                    <th class="forum_ntop">Topics</th>
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
                $dn1 = mysql_query('select c.id, c.name, c.description, c.position, (select count(t.id) from topics as t where t.parent=c.id and t.id2=1) as topics, (select count(t2.id) from topics as t2 where t2.parent=c.id and t2.id2!=1) as replies from categories as c group by c.id order by c.position asc');
                $nb_cats = mysql_num_rows($dn1);
                while ($dnn1 = mysql_fetch_array($dn1)) {
                    ?>
                    <tr>
                        <td class="forum_cat"><a href="list_topics.php?parent=<?php echo $dnn1['id']; ?>" class="title"><?php echo htmlentities($dnn1['name'], ENT_QUOTES, 'UTF-8'); ?></a>
                            <div class="description"><?php echo $dnn1['description']; ?></div></td>
                        <td><?php echo $dnn1['topics']; ?></td>
                        <td><?php echo $dnn1['replies']; ?></td>
                        <?php
                        if (isset($_SESSION['username']) and $_SESSION['username'] == $admin) {
                            ?>
                            <td><a href="delete_category.php?id=<?php echo $dnn1['id']; ?>"><img src="<?php echo $design; ?>/images/delete.png" alt="Delete" /></a>
                                <?php if ($dnn1['position'] > 1) { ?><a href="move_category.php?action=up&id=<?php echo $dnn1['id']; ?>"><img src="<?php echo $design; ?>/images/up.png" alt="Move Up" /></a><?php } ?>
                                <?php if ($dnn1['position'] < $nb_cats) { ?><a href="move_category.php?action=down&id=<?php echo $dnn1['id']; ?>"><img src="<?php echo $design; ?>/images/down.png" alt="Move Down" /></a><?php } ?>
                                <a href="edit_category.php?id=<?php echo $dnn1['id']; ?>"><img src="<?php echo $design; ?>/images/edit.png" alt="Edit" /></a></td>
                            <?php
                        }
                        ?>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
            if (isset($_SESSION['username']) and $_SESSION['username'] == $admin) {
                ?>
                <a href="new_category.php" class="btn btn-success">New Category</a>
                <?php
            }
            if (!isset($_SESSION['username'])) {
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