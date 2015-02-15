<?php

include 'config/db.php';
include 'user/user.php';

session_start();

$user = new user();

$emailFor = $_SESSION['email'];

?>
<html>

    <head>
        <title>MomprO</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/agency.css" rel="stylesheet">
        <script language="javascript" type="text/javascript"></script>
    </head>

    <body>

        <p></p>

        <div class="container" >
            <ul class="nav nav-tabs ">
               
                <li class="active"><a href="profile.php"><span class="glyphicon glyphicon-user"> MyProfile</span></a></li>
                <li><a href="forum/index.php"><span class="glyphicon glyphicon-envelope"> Forum</span></a></li>
                <li><a href="appoinment/mother_view.php"><span class="glyphicon glyphicon-briefcase"> Appointment</span></a></li>
                <li><a href="Event/scheduleMotheView.php"><span class="glyphicon glyphicon-bell"> Schedule</span></a></li>
                <li><a href="report/graph_inputs2.php"><span class="glyphicon glyphicon-bell"> Report Analyzer</span></a></li>
                <li><a href="Track/track.php"><span class="glyphicon glyphicon-bell"> Tracker</span></a></li>
                <li><a href="contactus.php"><span class="glyphicon glyphicon-bell"> ContactUs</span></a></li>
                <li><a href="aboutus.php"><span class="glyphicon glyphicon-user"> AboutUs</span></a></li>
                <a href="index.php" onclick="<?php $user->logOut(); ?>"><button class="btn btn-primary" >Logout</button></a>
            </ul>
        </div>

        <br><br>
        <div class="container">
            <br>

            <div class="col-lg-4" style="background-color: #ccccff ; border-radius: 10" >

                <h3><p><b>WellCome Back</b><i> <?php echo $user->getUserName($emailFor); ?></i></p></h3>


                <img src="images/photo.jpg"  class="img-rounded center-block" width="200" height="200">


                <div class="row">
                    <div class="col-lg-4">
                        <h4><p><b>
                                    Name<br><br>Email<br><br>Birth Day<br><br>Tel No

                                </b></p></h4>
                    </div>

                    <div class="col-lg-8">
                        <h4><p><em><b>
                                        <?php
                                        echo $user->getFirstName($emailFor) . " ";
                                        echo $user->getLastName($emailFor) . "<br><br>";

                                        echo $user->getEmail($emailFor) . "<br><br>";
                                        echo $user->dateOfBirth($emailFor) . "<br><br>";
                                        echo $user->teleNo($emailFor) . "<br><br>";
                                        ?>

                                    </b></em></p></h4>
                    </div>

                </div>

            </div>

            <div class="col-lg-1"></div>
            <div class="col-lg-7"><h3><p class="text-primary text-justify"><em>
                <?php
                $result = mysql_query("SELECT * FROM happy ORDER BY RAND()");
                $user_data = mysql_fetch_array($result);
                echo $user_data['happy'].'<br><br>'.$user_data['nice'];
                ?>
                        </em></p></h3></div>

            <br><br>
        </div>


    </body>

</html>