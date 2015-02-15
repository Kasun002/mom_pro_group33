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
                    <a href="selectUser.php" class="btn btn-success ">VIEW USERS DETAILS</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="insert.php" class="btn btn-success">INSERT USERS</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-success">EDIT USERS</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="history.php" class="btn btn-success active">USER HISTORY</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-danger ">DROP USERS</a>
                </div>
                <br>
               
            </div>
            <div class="col-lg-1"></div>
            

        </div> 
        
        <div class="col-lg-9" style=" background-color: #cccccc ">
            <h2><p class="text-center text-success"><b><em><i>MOMPRO Control Panel</i></em></b></p></h2>
            <div class="btn-group btn-group-justified">
                <a href="#" class="btn btn-warning">Private Massages</a>
                <a href="#" class="btn btn-warning">Public Forum</a>
                <a href="#" class="btn btn-warning">User History</a>
                <a href="#" class="btn btn-warning">Notifications</a>
                
                <a href="../index.php" class="btn btn-primary" onclick="<?php $user->logOut() ?>">Log Out</a>
            </div>
            
            <br>
        </div>
        <h3><p class="text-center text-primary"><b><em><i>Manage User History</i></em></b></p></h3>
        <p></p><br>
        <div class="col-lg-9" style=" background-color: #cccccc ">
            <div class="col-lg-3">
                <img src="../images/view.jpg" class="img-rounded" width="215" height="200">
                <p></p><br>
                <div class="btn-group btn-group-justified">
                    <a href="viewHistory.php" class="btn btn-success ">VIEW HISTORY</a>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <img src="../images/update.jpg" class="img-rounded" width="215" height="200">
                <p></p><br>
                <div class="btn-group btn-group-justified">
                    <a href="updateHistory.php" class="btn btn-success ">UPDATE HISTORY</a>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <img src="../images/edite.jpg" class="img-rounded" width="215" height="200">
                <p></p><br>
                <div class="btn-group btn-group-justified center-block">
                    <a href="editeHistory.php" class="btn btn-success ">EDITE HISTORY</a>
                </div>
            </div>
        </div>

    </body>

</html>