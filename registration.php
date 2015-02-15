<?php 

include 'config/db.php';
include 'user/user.php';

session_start();

$con = new connectToDb();
$con->checkConnection();

$checkReg = new user();
				

?>

<html>
	<head>


		<title>MomprO</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">

	    <link href="css/agency.css" rel="stylesheet">

		<script language="javascript" type="text/javascript"></script>
    
	</head>

	<body>

		<br>

		<div class="container">
			<ul class="nav nav-tabs">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"> Home</span></a></li>
				<li><a href="profile.php"><span class="glyphicon glyphicon-user"> MyProfile</span></a></li>
				<li><a href="forum.php"><span class="glyphicon glyphicon-envelope"> Forum</span></a></li>
				<li><a href="reservation.php"><span class="glyphicon glyphicon-briefcase"> Reservation</span></a></li>				
				<li><a href="contactus.php"><span class="glyphicon glyphicon-bell"> ContactUs</span></a></li>
				<li><a href="whymompro.php"><span class="glyphicon glyphicon-cloud"> WhyMompro</span></a></li>
				<li><a href="aboutus.php"><span class="glyphicon glyphicon-user"> AboutUs</span></a></li>
				<div class="col-lg-3">
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

		<br>
		<p></p>
		<div class="container">

			<?php

			if(isset($_REQUEST['submit'])){			

			if(	isset($_POST['usertype']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) 
				&& isset($_POST['tel_no'])  && isset($_POST['nic_no']) && isset($_POST['date_of_brth']) && isset($_POST['add1']) && isset($_POST['add2']) 
				&& isset($_POST['city']) && isset($_POST['regione']) && isset($_POST['pswrd']) && isset($_POST['cnfrmpswrd'])){

					if(!empty($_POST['usertype']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['username']) &&
						!empty($_POST['email']) && !empty($_POST['tel_no']) && !empty($_POST['nic_no']) && !empty($_POST['date_of_brth']) &&
						!empty($_POST['add1']) && !empty($_POST['add2']) && !empty($_POST['city']) && !empty($_POST['regione']) &&
						!empty($_POST['pswrd']) && !empty($_POST['cnfrmpswrd'])){

						if($_POST['pswrd'] == $_POST['cnfrmpswrd']){

							$reg = $checkReg->reg( 
								$_POST['usertype'], 
								$_POST['firstname'], 
								$_POST['lastname'], 
								$_POST['username'], 
								$_POST['email'],
								$_POST['tel_no'], 
								$_POST['nic_no'], 
								$_POST['date_of_brth'], 
								$_POST['add1'], 
								$_POST['add2'], 
								$_POST['city'],
								$_POST['regione'],
								$_POST['pswrd']);

							
							if($reg){	
                                                               
                                                                header("location:login2.php");
							}else{
                                                            ?>
                    <p class="text-danger h3"> Registration failed</p>
                                                                <?php
							}

						}else{
							?>
                    <p class="text-danger h3">Password does not match</p>
                                                                <?php
						}

							
					}else{
						?>
                    <p class="text-danger h3"> All fields are required </p>
                                                                <?php
					}

				}
			}
			?>
				
			<form action="" method="POST">
				<div class="row">
					<div class="col-lg-3">
                                            
						<select class="dropdown" name="usertype">
                                                    <option>Docter</option>
                                                    <option>Nurse</option>
                                                    <option>Mother</option>
                                                </select>
                                            <p></p><br><p></p><br>
						<div class="form-group">
							<label >First Name</label>
							<input type="text" class="form-control"  name="firstname" placeholder="First Name" name="<?php echo $_POST['firstname']?>">
						</div>
						<div class="form-group">
							<label >Last Name</label>
							<input type="text" class="form-control" name="lastname" placeholder="Last Name" name="<?php echo $_POST['lastname']?>">
						</div>
						<div class="form-group">
							<label >User Name</label>
							<input type="text" class="form-control" name="username" placeholder="User Name" >
						</div>
					</div>
					<div class="col-lg-3">
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
                                                        <input type="text" class="form-control" name="nic_no"  placeholder="National ID Number">
						</div>
						<div class="form-group">
							<label>Date Of Birth</label>
							<input type="date" class="form-control" name="date_of_brth" placeholder="Date Of Birth">
						</div>
						

						
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label >Address Line1</label>
							<input type="text" class="form-control" name="add1"  placeholder="Address line1" name="<?php echo $_POST['add1']?>">
						</div>
						<div class="form-group">
							<label >Address Line2</label>
							<input type="text" class="form-control" name="add2" placeholder="Address line2" name="<?php echo $_POST['add2']?>">
						</div>
						<div class="form-group">
							<label >City</label>
							<input type="text" class="form-control" name="city" placeholder="Address line1" name="<?php echo $_POST['city']?>">
						</div>
						<div class="form-group">
							<label >Region</label>
							<input type="text" class="form-control" name="regione"  placeholder="Address line1" name="<?php echo $_POST['regione']?>">
						</div>
						
					</div>
					<div class="col-lg-3">
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