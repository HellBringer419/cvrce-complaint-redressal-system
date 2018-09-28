<?php
session_start();
include("../config.php");

// Insert data
if(isset($_POST['login'])) {
    $name=$_POST['userid'];
    $code=$_POST['passwd'];
    
    // ////////////////  Aloha region
    $stmt = $conn ->prepare('SELECT * FROM faculty WHERE empid = ?  AND PASS = ? ');
    $stmt->bind_param('ss', $name, $code ); // 's' specifies the variable type => 'string'
    
    $stmt->execute();
    
    $result = $stmt->get_result();
    if($row = $result->fetch_assoc()) {
	$valued = $row["name"];

	$_SESSION['empid'] = $row['empid'];
	$_SESSION['username'] = $valued;
	$_SESSION['type'] = 'a faculty';
	header('Location: ../mentor/addStudent.php');
	die();
    }

    else {
	header("Location: facultyLogin.php");
	die();
    }
    
}
else {
    echo "Errors bigger than thought";
}

$conn -> close();

?>
