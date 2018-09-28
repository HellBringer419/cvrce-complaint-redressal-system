<?php
session_start();

include('../config.php'); // i nclude config.php

// Insert data
if(isset($_POST['login'])) {
    $name=$_POST['userid'];
    $userCode=$_POST['passwd'];
    $code = md5($userCode);

    $stmt = $conn ->prepare('SELECT * FROM users WHERE REGID = ? AND PASS = ? '); //change UserName to RegId
    $stmt->bind_param('ss', $name, $code ); 
    
    $stmt->execute();
    
    $result = $stmt->get_result();
    if($row = $result->fetch_assoc()) {
	$valued = $row["REGID"];
	$_SESSION['type'] = 'a student';
	$_SESSION['username'] = $row['USERNAME'];
	$_SESSION['regid'] = $valued; // RegId in session
	header('Location: ../complaint/showComp.php'); // redirect to complaints
	die();
    }

    else {
	$_SESSION['log'] = " Credentials are not correct ";
	header("Location: studentLogin.php");
	/* return "error"; */
	die();
    }
    
}

$conn->close();

?>
