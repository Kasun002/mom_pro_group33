<?php require_once('maxChart.class.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Report Details Analysing Chart</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
   <div id="container">
      <div id="header"><div id="header_left"></div><div id="header_main">Report Details Analysing Chart</div><div id="header_right"></div></div>

      <div id="main">
         <?php
         $q = ($_GET['q']);
        


$con = mysqli_connect('localhost','root','','momprov');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT $q,date FROM graph WHERE id=1";
$result= mysqli_query($con,$sql) or die("error!");
//echo mysqli_num_rows($result);

//echo $row[0];
//echo $row[1];
$arr=array();
while($row=mysqli_fetch_array($result)){
    $arr[$row[1]]=$row[0];
}

//print_r($arr);
        
            $mc = new maxChart($arr);
            $d;
            if($q=='random_blood'){
                $d='Random Blood Sugar';
            }elseif ($q=='fasting_blood') {
                $d='Fasting Blood Sugar';    
            }elseif ($q=='pressure_value1') {
                $d='Systolic Pressure';
            }  else {
                $d='Diastolic Pressure';
            }
            $mc->displayChart($d,1,700,500,TRUE);
            echo "<br/><br/>";
         mysqli_close($con);
            ?>
         
      </div>
      
   </div>
   
</body>
</html>




