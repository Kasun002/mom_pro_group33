<?php
//This page let create a new category
include('config.php');
if (isset($_SESSION['username']) and $_SESSION['username'] == $admin) {
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
            <title>New Category - Forum</title>
            <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/agency.css" rel="stylesheet">
        <script language="javascript" type="text/javascript"></script>
        </head>
        <body class="col-lg-12">
            
            <div class="container">
                <?php
                $nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="' . $_SESSION['userid'] . '" and user1read="no") or (user2="' . $_SESSION['userid'] . '" and user2read="no")) and id2="1"'));
                $nb_new_pm = $nb_new_pm['nb_new_pm'];
                ?>
                <div class="breadcrumb">
                    <div class="box_left">
                        <a href="<?php echo $url_home; ?>">Forum Home</a> &gt; New Category
                    </div>
                    <div class="box_right">
                         <a href="login.php">Logout</a>
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
                    if (mysql_query('insert into categories (id, name, description, position) select ifnull(max(id), 0)+1, "' . $name . '", "' . $description . '", count(id)+1 from categories')) {
                        ?>
                        <div class="message">The category have successfully been created.<br />
                            <a href="<?php echo $url_home; ?>">Forum Home</a></div>
                        <?php
                    } else {
                        echo 'An error occured while creating the category.';
                    }
                } else {
                    ?>
                    <form action="new_category.php" method="post">
                        <label class="text-primary"for="name">Name</label><input type="text" name="name" id="name" /><br />
                        <label class="text-primary" for="description">Description</label><br />
                        <textarea class="form-control" name="description" id="description" cols="70" rows="6"></textarea><br />
                        <input class="btn btn-success" type="submit" value="Create" />
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
            ?>