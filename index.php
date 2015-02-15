<?php
include 'config/db.php';
include 'user/user.php';

$con = new connectToDb();
$con->checkConnection();
?>

<html>
    <head>
        <title>MomprO</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/agency.css" rel="stylesheet">
        <script language="javascript" type="text/javascript"></script>

    </head>

    <body>

        <div class="container">
            <p></p>
            <ul class="nav nav-tabs">
                <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"> Home</span></a></li>
                <li><a href="contactus.php"><span class="glyphicon glyphicon-bell"> ContactUs</span></a></li>
                
                <li><a href="aboutus.php"><span class="glyphicon glyphicon-user"> AboutUs</span></a></li>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default">Go</button>
                        </span>
                    </div>
                </div>
            </ul>

        </div>

        <img src="images/header.jpg" width="1300" hight="400">

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <center><h2><p class="text-primary">Our Vision</p></h2></center>
                    <h4><p class="text-justify text-primary"><em>
                                Is to make a system which could be more reliable with ensuring availability and conveniency of the doctor and the hospital. 
                                And with this we could reduce the stress and could build more confidence on mothers</em></p></h4>

                </div>

                <div class="col-lg-6">
                    <marquee direction="left"><h3><p class="text-justify text-primary"><em>Our services</em></p></h3></marquee>
                    <script type="text/javascript">
                        var image1 = new Image()
                        image1.src = "images/app.jpg"
                        var image2 = new Image()
                        image2.src = "images/doctor.jpg"
                        var image3 = new Image()
                        image3.src = "images/cover.jpg"

                    </script>
                    <img src="app.jpg" name="slide">
                    <script type="text/javascript">
                        var step = 1
                        function slideit() {
                            document.images.slide.src = eval("image" + step + ".src")
                            if (step < 3)
                                step++
                            else
                                step = 1
                            setTimeout("slideit()", 2500)

                        }
                        slideit()
                    </script>
                    <br>


                </div>

                <div class="col-lg-3">


                    <form action="changer.php" method="POST" name="login">
                        <div class="form-group">
                            <label for="inputEmail"><p class="text-primary"><em>Email</em></p></label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword"><p class="text-primary"><em>Password</em></p></label>
                            <input type="password" class="form-control" placeholder="Password" name = "pswrd">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox"><p class="text-primary"><em>Remember me</em></p></label>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        <a href="#">    Forgot My Password</a>

                    </form>
                    <p></p>
                    <p>Are you have a Mompro account ?</p>
                    <div class="btn-group btn-group-justified">
                        <a href="registration.php" class="btn btn-primary">Create New Account</a>
                    </div>

                </div>
            </div>
        </div>

        <br><br>
        <div class="container">

            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <ul class="breadcrumb">
                    <li><a href="#"></a>Mompro.org</li>
                    <li><a href="#"></a>Privacy Policy</li>
                    <li><a href="#"></a>Terms of Use</li>
                    <li><a href="#"></a>Countact Us</li>
                    <li><a href="#"></a>Help</li>

                </ul>

            </div>
            <div col-lg-3></div>

        </div>


    </body>

</html>