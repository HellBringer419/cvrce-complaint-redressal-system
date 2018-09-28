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
	<script
	    src="https://code.jquery.com/jquery-3.3.1.js"
	    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	    crossorigin="anonymous"> 
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
		    <form action="studentLoginNext.php" method="post">

			<div align="center">
			    <h3>Student Log in Here</h3>
			</div>
			<br/>
			<table  align="center">
			    <tr>
				<td> Enter your Registration Number: </td>
				<td> <input class="userid"  type="number" name="userid" required> </td>
			    </tr>
			    
			    <tr>
				<td> Enter your Password:  </td>
				<td> <input class="passwd"  type="password" name="passwd" required/> </td>
			    </tr>
			</table>
			<br/> <br/> <br/>
			<div  align="center">
			    <a href="../register/studentRegister.php"> Click to register </a>  &nbsp;  &nbsp;
			    <input id="formsubmitbutton" class="btn" type="submit" name="login" value=" Click to Login" />
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

	<script type="text/javascript">
	 $(document).on('click', '.formsubmitbutton', function(e) {
	     e.preventDefault();
	     $.ajax({
		 type: "POST",
		 url: $(".form").attr('action'),
		 data: $(".form").serialize(),
		 success: function(response) {
		     if (response === "error") {
			 alert("invalid username/password.  Please try again");
		     } 
		 }
	     });
	 });
	</script>
	
    </body>
</html>
