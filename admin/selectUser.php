<?php
include '../config/db.php';
include '../user/user.php';

$user = new user();

session_start();

?>

<html>
    <head>
        <title>MomprO</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/agency.css" rel="stylesheet">
        <link href="../js/bootstrap.js" rel="stylesheet">
        <link href="../js/bootstrap.min.js" rel="stylesheet">
        <link href="../js/npm.js" rel="stylesheet">
        <link href="../js/bootstrap-dropdown.js" rel="stylesheet">
        <script src="../js/"></script>
        <script src="../js/msy.js"></script>
        <script src="../js/bootstrap-transition.js"></script>
        <script src="../js/live.js"></script>
        <script src="../js/bootstrap-alert.js"></script>
        <script src="../js/bootstrap-modal.js"></script>
        
        <script src="../js/bootstrap-dropdown.js"></script>
        <script src="../js/bootstrap-scrollspy.js"></script>
        <script src="../js/bootstrap-tab.js"></script>
        <script src="../js/bootstrap-tooltip.js"></script>
        <script src="../js/bootstrap-popover.js"></script>
        <script src="../js/bootstrap-button.js"></script>
        <script src="../js/bootstrap-collapse.js"></script>
        <script src="../js/bootstrap-carousel.js"></script>
        <script src="../js/bootstrap-typeahead.js"></script>
        <script src="../js/application.js"></script>
	
        
        
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
                    <a href="../appoinment/index.php" class="btn btn-primary">Appointment</a>
                </div>
                <br>
           

               
                <div class="btn-group btn-group-justified">
                    <a href="selectUser.php" class="btn btn-success active">VIEW USERS DETAILS</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="insert.php" class="btn btn-success">INSERT USERS</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="updateHistory.php" class="btn btn-success">USER HISTORY</a>
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
        
        <h3><p class="text-center text-primary"><b><em><i>User category</i></em></b></p></h3>
        <p></p><br>
        <div class="col-lg-9" style=" background-color: #cccccc ">
            <div class="col-lg-3">
                <img src="../images/doc.jpg" class="img-rounded" width="215" height="200">
                <p></p><br>
                <div class="btn-group btn-group-justified">
                    <a href="selectDocter.php" class="btn btn-success ">Doctors</a>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <img src="../images/assistence.jpg" class="img-rounded" width="215" height="200">
                <p></p><br>
                <div class="btn-group btn-group-justified">
                    <a href="selectNurse.php" class="btn btn-success ">Nurses</a>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <img src="../images/mother.jpg" class="img-rounded" width="215" height="200">
                <p></p><br>
                <div class="btn-group btn-group-justified center-block">
                    <a href="selectMother.php" class="btn btn-success ">Mothers</a>
                </div>
            </div>
        </div>

    </body>

</html>