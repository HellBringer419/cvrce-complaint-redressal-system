<?php
session_start();
include('../config.php');
// Insert data
if(isset($_POST['login'])) {
    $name=$_POST['userid'];
    $code=$_POST['passwd'];
    
    // ////////////////  Aloha region
    $stmt = $conn ->prepare('SELECT * FROM employee WHERE empid = ?  AND pass = ? ');
    $stmt->bind_param('ss', $name, $code ); // 's' specifies the variable type => 'string'
    
    $stmt->execute();
    
    $result = $stmt->get_result();
    if($row = $result->fetch_assoc()) {
	$_SESSION['username'] = $row["name"];
	$flag = $row['priority'];
	
	if($flag >= 3 ) {
	    $_SESSION['type'] = "an admin";
	    header('Location: ../superuser/showAllComp.php');	
	}
	else {
	    $_SESSION['type'] = "an authority";
	    header('Location: ../index.php');
	}

	die();
    } else {
	$_SESSION['log'] = " Username/Password is incorrect ";
	header("location: adminLogin.html");
	die();
    }


    
}
else {
    echo "Errors bigger than thought";
}

$conn -> close();

?>
