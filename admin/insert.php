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
        <script language="javascript" type="text/javascript"></script>

    </head>

    <body style="background-color: #cccccc ">
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
                    <a href="selectUser.php" class="btn btn-success">VIEW USERS DETAILS</a>
                </div>
                <br>

                <div class="btn-group btn-group-justified">
                    <a href="insert.php" class="btn btn-success active">INSERT USERS</a>
                </div>
                <br>

                

                <div class="btn-group btn-group-justified">
                    <a href="updateHistory.php" class="btn btn-success">USER HISTORY</a>
                </div>
                <br>

                <div class="btn-group btn-group-justified">
                    <a href="../index.php" class="btn btn-danger ">Logout</a>
                </div>
                <br>





            </div>
            <div class="col-lg-1"></div>


        </div> 

        
         <p class="text-center text-success h1"><b><em><i>MOMPRO Control Panel</i></em></b></p>
  
        <p class="text-success h2"><b><em><i>Insert new user</i></em></b></p>
        
        <div class="col-lg-9" style=" background-color: #cccccc ">

            <div class="col-lg-12">

                <?php
                
                if (isset($_REQUEST['submit'])) {

                    if (isset($_POST['usertype']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['tel_no']) && isset($_POST['nic_no']) && isset($_POST['date_of_brth']) && isset($_POST['add1']) && isset($_POST['add2']) && isset($_POST['city']) && isset($_POST['regione']) && isset($_POST['pswrd']) && isset($_POST['cnfrmpswrd'])) {

                        if (!empty($_POST['usertype']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['username']) &&
                                !empty($_POST['email']) && !empty($_POST['tel_no']) && !empty($_POST['nic_no']) && !empty($_POST['date_of_brth']) &&
                                !empty($_POST['add1']) && !empty($_POST['add2']) && !empty($_POST['city']) && !empty($_POST['regione']) &&
                                !empty($_POST['pswrd']) && !empty($_POST['cnfrmpswrd'])) {

                            if ($_POST['pswrd'] == $_POST['cnfrmpswrd']) {

                                $reg = $checkReg->reg(
                                        $_POST['usertype'], $_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['email'], $_POST['tel_no'], $_POST['nic_no'], $_POST['date_of_brth'], $_POST['add1'], $_POST['add2'], $_POST['city'], $_POST['regione'], $_POST['pswrd']);


                                if ($reg) {

                                    echo "registration successfull";
                                } else {
                                    echo "registration failed";
                                }
                            } else {
                                echo "password does not match";
                            }
                        } else {
                            echo "All field are required";
                        }
                    }
                }
                ?>

                <form action="../admin/admin.php" method="POST">

                    <div class="col-lg-9" style=" background-color: #cccccc ">

                        <select class="dropdown" name="usertype">
                            <option>Docter</option>
                            <option>Nurse</option>
                            <option>Mother</option>
                        </select>
                        <p></p>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">

                            <div class="form-group">
                                <label >First Name</label>
                                <input type="text" class="form-control"  name="firstname" placeholder="First Name" name="<?php echo $_POST['firstname'] ?>">
                            </div>
                            <div class="form-group">
                                <label >Last Name</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" name="<?php echo $_POST['lastname'] ?>">
                            </div>
                            <div class="form-group">
                                <label >User Name</label>
                                <input type="text" class="form-control" name="username" placeholder="User Name" >
                            </div>

                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <label>Telephone Number</label>
                                <input type="number" class="form-control" name="tel_no"  placeholder="Telephone Number">
                            </div>

                            <div class="form-group">
                                <label>National ID Number</label>
                                <input type="number" class="form-control" name="nic_no" placeholder="National ID Number">
                            </div>
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <input type="date" class="form-control" name="date_of_brth" placeholder="Date Of Birth" name="<?php echo $_POST['date_of_brth'] ?>">
                            </div>

                        </div>

                        <div class="col-lg-5"></div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label >Address Line1</label>
                                <input type="text" class="form-control" name="add1"  placeholder="Address line1" name="<?php echo $_POST['add1'] ?>">
                            </div>
                            <div class="form-group">
                                <label >Address Line2</label>
                                <input type="text" class="form-control" name="add2" placeholder="Address line2" name="<?php echo $_POST['add2'] ?>">
                            </div>
                            <div class="form-group">
                                <label >City</label>
                                <input type="text" class="form-control" name="city" placeholder="Address line1" name="<?php echo $_POST['city'] ?>">
                            </div>
                            <div class="form-group">
                                <label >Region</label>
                                <input type="text" class="form-control" name="regione"  placeholder="Address line1" name="<?php echo $_POST['regione'] ?>">
                            </div>


                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" class="form-control" name="pswrd" id="inputEmail" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Confirm Password</label>
                                <input type="password" class="form-control" name="cnfrmpswrd" id="inputEmail" placeholder="Password">
                            </div>
                            <div class="btn-group">
                                <button type="submit" name="submit" class="btn btn-primary">Create My Account</button>
                            </div>
                        </div>
                    </div>
                </form>


            </div>

        </div>



    </body>

</html>