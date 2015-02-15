<?php

class user {

    public $loginVariable = false;


    public function login($email, $pswrd) {
        $ps = md5($pswrd);

        $result = mysql_query("SELECT user_id from users WHERE email='$email' and pswrd='$ps'");
        $user_data = mysql_fetch_array($result);
        $count_row = mysql_num_rows($result);

        if ($count_row == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function reg($usertype, $firstname, $lastname, $username, $email, $telno, $nicno, $date, $add1, $add2, $city, $regione, $pswrd) {

        $ps = md5($pswrd);
        $check = mysql_query("SELECT * FROM users WHERE user_name='$username' OR email='$email' OR nic_no='$nicno'");

        $count_row = mysql_num_rows($check);
        
        if ($count_row == 0) {

            $result = mysql_query("INSERT INTO users (user_type,first_name,last_name,user_name,email,tele_no,nic_no,b_date,add_line1,add_line2,city,regione,pswrd) 
				VALUES ('$usertype','$firstname', '$lastname','$username','$email', '$telno', '$nicno', '$date', '$add1', '$add2', '$city', '$regione', '$ps')");

            return true;
        } else {

            echo "Duplicate values are not allows, please check your Email/username/NIC no";
            return false;
        }
    }
    
    public function loginSession(){
        $loginVariable = true;
    }
    
    public function logoutSession(){
        $loginVariable = false;
    }

    public function logOut() {
        
        
        $x = 0;
        $_SESSION['login'] = $x;
        session_destroy();
    }

    public function getDetails() {
        $result = mysql_query("SELECT * FROM users");
        $data=array();
        while($userData = mysql_fetch_array($result)){
            $data=$userData;
            
        }
        
    }

    public function getUserType($email) {
        $result = mysql_query("SELECT * FROM users WHERE email='$email'");
        $user_data = mysql_fetch_array($result, MYSQLI_ASSOC);
        return $user_data['user_type'];
    }

    public function getUserName($email) {
        $result = mysql_query("SELECT * FROM users WHERE email='$email'");
        $user_data = mysql_fetch_array($result, MYSQLI_ASSOC);
        return $user_data['user_name'];
    }

    public function getFirstName($email) {
        $result = mysql_query("SELECT * FROM users WHERE email='$email'");
        $user_data = mysql_fetch_array($result, MYSQLI_ASSOC);
        return $user_data['first_name'];
    }

    public function getLastName($email) {
        $result = mysql_query("SELECT * FROM users WHERE email='$email'");
        $user_data = mysql_fetch_array($result, MYSQLI_ASSOC);
        return $user_data['last_name'];
    }

    public function getEmail($email) {
        $result = mysql_query("SELECT * FROM users WHERE email='$email'");
        $user_data = mysql_fetch_array($result, MYSQLI_ASSOC);
        return $user_data['email'];
    }

    public function teleNo($email) {
        $result = mysql_query("SELECT * FROM users WHERE email='$email'");
        $user_data = mysql_fetch_array($result, MYSQLI_ASSOC);
        return $user_data['tele_no'];
    }

    public function dateOfBirth($email) {
        $result = mysql_query("SELECT * FROM users WHERE email='$email'");
        $user_data = mysql_fetch_array($result, MYSQLI_ASSOC);
        return $user_data['b_date'];
    }

}

?>