<?php
session_start();
?>
<html>
    <head>
	<title> Student Login </title>
	<link rel="stylesheet" href="../styles.css" >
	<style>
	 .error{
	     color : red;
	 }
	</style>
	<script>
	 function logsout() {
	     var flag = confirm("Are you sure you want to LOGOUT ?");
	     if(flag == true) {
		 window.location.href = "../logout/logOut.php";
	     }
             else {
		 window.location.href = "../index.php";
             }
	</script>
    </head>

    <body>
	<div class="background">
	    <!-- <span class="logo"> @ </span> -->
	    <div class="navbar">
		<br/> <br/>
		<span class="logo"> @ </span>
 		
		<span class="homeAnchor"><a href="../index.php">  Home </a> </span>
		<span class="registerAnchor"><a href="../register/studentRegister.php"> Student-Register </a> </span>
		<span class="aboutAnchor"><a href="#aboutUs"> About Us </a> </span>
		<span class="contactAnchor"><a href="#contactUs"> Contact Us </a></span>
	    </div>

	    <div>
		<div class="indexCard">
		    <form action="facultyLoginNext.php" method="post">

			<div align="center">
			    <h3>Faculty Logs in Here</h3>
			</div>
			<br/>
			<table  align="center">
			    <tr>
				<td> Enter your User Id: </td>
				<td> <input class="userid"  type="number" name="userid" required> </td>
			    </tr>
			    
			    <tr>
				<td> Enter your Password:  </td>
				<td> <input class="passwd"  type="password" name="passwd" required/> </td>
			    </tr>
			</table>
			<br/> <br/> <br/>
			<div  align="center">
			    <input class="btn" type="submit" name="login" value=" Click to Login" />
			</div>
		    </form>

		    <?php
		    if(isset($_SESSION['username'])) {
			echo "<script> logsout(); </script>";
		    } 
		    ?>
		    
		</div>
	    </div>

	</div>
	
	<div class="aboutUs">
	    So this seems to be a company, huh?
	</div>

	<div class="contactUs" id="contactUs">
	    So this seems to be a company, huh?
	</div>
	
    </body>
</html>
