<?php
include('../config.php');

$error_regn = $error_name =  $error_email =  $error_pass = $error_phno =  " ";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit'])){
    $regid=test_input($_POST['regid']);
    //	$sql="SELECT `REGID` FROM `users`";
    //	$res=$conn->mysqli_querry($sql);
    //while($row = $res->fetch_array()){
    //	if($row['regid'] == $regid)
    //		$error_regn = "Account Already Exists";
    //}
    
    $username=test_input($_POST['uname']);
    $fname=test_input($_POST['fname']);
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
    	$error_name = "Only letters and white space allowed"; 
    }
    $lname=test_input($_POST['lname']);
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
    	$error_name = "Only letters and white space allowed"; 
    }
    $email=test_input($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$error_email = "Invalid email format"; 
    }
    $contact=test_input($_POST['phno']);

    $branch=test_input($_POST['branch']);
    $hostel=test_input($_POST['hostel']);
    $pass=test_input($_POST['pass1']);
    $pass2=test_input($_POST['pass2']); 
    if($pass == $pass2){
	$pass=md5($pass);
	$sql = "INSERT INTO `users`(`REGID`, `USERNAME`, `PASS`, `BRANCH`, `HOSTEL`, `first_name`, `last_name`, `email`, `contact`) VALUES (?,?,?,?,?,?,?,?,?)";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("sssssssss",$regid,$username,$pass,$branch,$hostel,$fname,$lname,$email,$contact);
	if($stmt->execute())
	    header("Location: ../login/studentLogin.php");
	else
	    echo "failed";
    }else{
	$error_pass = "Password does not match ";
    }
    
}

?>
