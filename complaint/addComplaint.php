<?php
session_start();
?>

<html>
    <head>
	<title> Add Complaints </title>
	<link rel="stylesheet" href="../styles.css" >
	<link rel="stylesheet" href="compStyles.css">
	<style type="text/css">
	 img{
	     width: 250px;
	     height: auto;
	 }
	</style>
	<script>
	 function focusOnForm() {
	     var form = document.getElementById('CompContainer');
	     form.style.display = '';
	     form.scrollIntoView();
	 }
	</script>

    </head>

    <body onload="focusOnForm()">
	<div class="background">
	    <!-- <span class="logo"> @ </span> -->
	    <div class="navbar">
		<br/> <br/>
		<span class="logo"> @ </span>
 		
		<span class="homeAnchor"><a href="../index.php">  Home </a> </span>
		<?php
		if(isset($_SESSION['username'])) {
		    if($_SESSION['type'] == 'a student') {
			echo '<span class="registerAnchor"><a href="../complaint/showComp.php"> Show-Complaints </a> </span>  &nbsp; &nbsp;';
			echo '<span class="registerAnchor"><a href="../complaint/addComplaint.php"> Add-Complaints</a> </span>  &nbsp; &nbsp;';
		    }
		    else if($_SESSION['type'] == 'a faculty') {
			echo '<span class="registerAnchor"><a href="../mentor/addStudent.php"> Add-Students </a> </span>  &nbsp; &nbsp;';
		    }
		    else if($_SESSION['type'] == 'an admin') {
			echo '<span class="registerAnchor"><a href="../superuser/showAllComp.php"> Show-All-Complaints </a> </span>  &nbsp; &nbsp;';
		    }
		    else if($_SESSION['type'] == 'an authority') {
			// authority links here
		    }
		    else {
		    }
		}
		else {
		    echo '<span class="registerAnchor"><a href="../register/studentRegister.php"> Student-Register </a> </span>  &nbsp; &nbsp;';
		}
		?>
		<span class="aboutAnchor"><a href="#aboutUs"> About Us </a> </span>  &nbsp; &nbsp;
		<span class="contactAnchor"><a href="#contactUs"> Contact Us </a></span>
	    </div>

	    <div class="logout" >
		Welcome  <?php echo  $_SESSION['username']  ?>, 
		<br/>
		<br/>
		<div class="logoutPanel">
		    <span class="logoutBorder"> You seem to be <?php  echo $_SESSION['type']  ?></span> 
		    <a href="../logout/logOutNext.php" class="logoutBtn"> Log Out </a>
		</div>
	    </div>


	</div>

	<div class="CompContainer" align="center" id="CompContainer">
	    
	    <form method="post" action="">
		<div class="addCompGrid">
		    <span> Problem	title </span>
		    <span> <input type="text" name="title"> </span>

		    <span> Type </span>
		    <span>
			<select name="type"> <br>
			    <option>Hostel</option>
			    <option>Food</option>
			    <option>Exam</option>
			    <option>Placement</option>
			    <option>Dsw</option>
			    <option>Other</option>
			</select>
		    </span>

		    <span>Description </span>
		    <span><textarea name="description" rows="4" cols="50"></textarea> </span>
		    <span> <br/><br/> <a href="showComp.php"> <- Back to show complaints </a></span>
		    <span> <br/> <br/> <input type="submit" name="submit"> </span>
		</div>
	    </form>

	    
	</div>
	
	<div class="aboutUs">
	    So this seems to be a company, huh?
	</div>

	<div class="contactUs" id="contactUs">
	    So this seems to be a company, huh?
	</div>

	
    </body>
</html>

<?php
include('../config.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit'])){
    
    $date=date("y-m-d");
    $user_id=test_input($_SESSION["regid"]);
    $description=test_input($_POST['description']);
    $type_name=test_input($_POST['type']);
    $type=0;
    if($type_name == "Other"){
	$type = 0;
    }else if ($type_name == "Hostel") {
	$type = 1;
    }else if ($type_name == "Dsw") {
	$type = 2;
    }else if ($type_name == "Exam") {
	$type = 4;
    }else if ($type_name == "Food") {
	$type = 5;
    }else if ($type_name == "Placement") {
	$type = 3;
    }else{
	$type= 9;
    }
    $title=test_input($_POST['title']);

    $sql="INSERT INTO `complaints`( `user_id`, `description`, `type`,  `created_at`, `title`) VALUES (?,?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("sssss",$user_id,$description,$type,$date,$title);
    if($stmt->execute())
	echo "<script> alert('complaint added successfully'); </script>";
    else
	echo "<script> alert('failed to add complaint'); </script>";

}
?>
