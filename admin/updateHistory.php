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

    <body  style="background-color: #cccccc">
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
                    <a href="selectUser.php" class="btn btn-success">VIEW USERS DETAILS</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="insert.php" class="btn btn-success">INSERT USERS</a>
                </div>
                <br>
                
                <div class="btn-group btn-group-justified">
                    <a href="historyType.php" class="btn btn-success active">USER HISTORY</a>
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
        
        <p class="text-center text-primary h3"><b><em><i>Update mother medical condition</i></em></b></p>
        <div class="col-lg-6" style=" background-color: #cccccc ">

            <form action="" method="POST">
               
            
                <label>Mother's Full Name</label>
                <div class="col-lg-6">                    
                    <div class="form-group"> 
                        <input type="text" class="form-control"  name="f_name" placeholder="First Name">
                    </div>
                </div>            

                <div class="col-lg-6">
                    <div class="form-group"> 
                        <input type="text" class="form-control"  name="l_name" placeholder="Last Name">
                    </div>
                </div>
                <label>Reason for Today's Visit</label>
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea class="form-control" rows="4" cols="50" name="reason"></textarea>
                    </div>
                </div>
                
                <label>Check all that apply to you or your immediate family (parents, siblings, grandparents)</label>
                <div class="col-lg-12">
                    <p></p>
                    <table><tr><td><input type="checkbox" name="asthma"></td><td><label>Asthma</label></td></tr> 
                        <tr><td><input type="checkbox" name="canser"></td><td><label>Canser</label></td></tr>
                        <tr><td><input type="checkbox" name="diabetes"></td><td><label>Diabetes</label></td></tr>
                        <tr><td><input type="checkbox" name="cardiac_disease"></td><td><label>Cardiac_Disease</label></td></tr>
                        <tr><td><input type="checkbox" name="hypertension"></td><td><label>Hypertension</label></td></tr>
                        
                    </table>
                </div>
                <p></p><br><p></p><br>
                <label>Check all symptoms you are currently experiencing</label>
                
                <div class="col-lg-12">
                    <table><tr><td><input type="checkbox" name="allergy"></td><td><label>Allergy</label></td></tr> 
                        <tr><td><input type="checkbox" name="eye"></td><td><label>Eye</label></td></tr>
                        <tr><td><input type="checkbox" name="fever"></td><td><label>Fever</label></td></tr>
                        <tr><td><input type="checkbox" name="cardiovascular"></td><td><label>cardiovascular</label></td></tr>
                        <tr><td><input type="checkbox" name="skin"></td><td><label>Skin</label></td></tr> 
                        <tr><td><input type="checkbox" name="neurological"></td><td><label>Neurological</label></td></tr>
                        <tr><td><input type="checkbox" name="psychiatric"></td><td><label>Psychiatric</label></td></tr>
                        <tr><td><input type="checkbox" name="weight_gain"></td><td><label>Weight Gain</label></td></tr>
                        <tr><td><input type="checkbox" name="Weight_loss"></td><td><label>Weight Gain</label></td></tr>                        
                    
                    </table>
                </div>
                
                <label>Please list any medication allergies that you have :</label>
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea class="form-control" rows="4" cols="50" name="got_medication"></textarea>
                    </div>
                </div>
                
                <label>Date </label>
                <div class="col-lg-4">
                    <input class="form-control" type="date" name="date">
                </div>
                
                <div class="col-lg-8">
                    <button class="btn btn-group btn-group-justified btn-primary" type="submit" name="submit">Update condition</button>
                </div>
            
            </form>
        </div>
        <div class="col-lg-12"><p></p><br><p></p><br><br></div>
</div>

<p></p>

</body>

</html>