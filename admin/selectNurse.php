<?php
include '../config/db.php';
include '../user/user.php';

$user = new user();

session_start();

$emailFor = "lakmal@gmail.com";

?>

<html>
    <head>
        <title>MomprO</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/agency.css" rel="stylesheet">
        <script language="javascript" type="text/javascript"></script>

    </head>

    <body style="background-color: #cccccc">
        <div class="col-lg-3" style="background-color: #cccccc">
            <br>
            <h3><p class="text-center text-info"><b><em><i>WELLCOME ADMIN</i></em></b></p></h3><br>
            <div class="col-lg-1"></div>
            
            <div class="col-lg-10">
                
                <img src="../images/admin.jpg" class="img-rounded" width="230" height="230">
                
                <br><br>
                
                <div class="btn-group btn-group-justified">
                    <a href="../Event/index.php" class="btn btn-primary">Doctor Schedule</a>
                </div>
                <br>
                <div class="btn-group btn-group-justified">
                    <a href="" class="btn btn-primary">Appointment</a>
                </div>
                <br>
  
                
                <div class="btn-group btn-group-justified">
                    <a href="selectUser.php" class="btn btn-success active">VIEW USER DETAILS</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="insert.php" class="btn btn-success">INSERT USERS</a>
                </div>
                <br>
                
                
                
                <div class="btn-group btn-group-justified">
                    <a href="updateHistory.php" class="btn btn-success">EDIT HISTORY</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="../index.php" class="btn btn-danger" onclick="<?php $user->logOut() ?>">Logout</a>
                </div>
                <br>
  
                




            </div>
            <div class="col-lg-1"></div>
            

        </div> 
        
        <p class="text-center text-success h1"><b><em><i>MOMPRO Control Panel</i></em></b></p>
  
        <h3><p class="text-success"><b><em><i>User category : Nurse</i></em></b></p></h2>
        <div class="col-lg-9" style=" background-color: #cccccc ">
            
            <?php
            
                $result = mysql_query("SELECT * FROM users where user_type='Nurse'");
                echo '<table class="table table-hover"><thead><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Tele No</th><th>NIC</th></tr></thead>';
                while ($user_data = mysql_fetch_array($result)){                 
                    echo '<tbody><tr><td>'.$user_data['first_name'].'</td><td>'.$user_data['last_name'].'</td><td>'.$user_data['email'].'</td><td>'.$user_data['tele_no'].'</td><td>'.$user_data['nic_no'].'</td></tr></tbody>';
                }
                echo '</table>';

                
            
            ?>
        </div>

    </body>

</html>