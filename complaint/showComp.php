<?php
session_start();
?>

<html>
    <head>
	<title> Show Complaints </title>
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
		Welcome  <?php  echo $_SESSION['username']  ?>, 
		<br/>
		<br/>
		<div class="logoutPanel">
		    <span class="logoutBorder"> You seem to be <?php echo  $_SESSION['type']  ?></span> 
		    <a href="../logout/logOutNext.php" class="logoutBtn"> Log Out </a>
		</div>
	    </div>


	</div>

	<div class="CompContainer" align="center" id="CompContainer">
	    <div class="showCompGrid">
		<a href="hostel.php"><img src="../assets/hostel.png" title="Hostel" /></a> 
		<a href="food.php"><img src="../assets/food.png"  title="food"></a> 
		<a href="exam.php"><img src="../assets/exam.png"  title="Exam"></a>
		<a href="dsw.php"><img src="../assets/dsw.png" title="DSW"></a> 
		<a href="placement.php"><img src="../assets/placement.png" title="Placement"></a> 
		<a href="others.php"><img src="../assets/others.png" title="others" ></a> 
	    </div>

	    <a href="addComplaint.php"><h3> Add Complaint </h3> </a>
	</div>
	
	<div class="aboutUs">
	    So this seems to be a company, huh?
	</div>

	<div class="contactUs" id="contactUs">
	    So this seems to be a company, huh?
	</div>

	
    </body>
</html>
