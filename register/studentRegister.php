<?php
session_start();
include('regn.php');
?>
<html>
    <head>
	<title> Register </title>
	<link rel="stylesheet" href="../styles.css" >
	<link rel="stylesheet" href="registerStyles.css">
	<style>
	 .error{
	     color : red;
	 }
	</style>
    </head>

    <body>
	<div class="background">
	    <!-- <span class="logo"> @ </span> -->
	    <div class="navbar">
		<br/> <br/>
		<span class="logo"> @ </span>
 		
		<span class="homeAnchor"><a href="../index.php">  Home </a> </span>
		<span class="registerAnchor"><a href="#"> Student-Register </a> </span>
		<span class="aboutAnchor"><a href="#aboutUs"> About Us </a> </span>
		<span class="contactAnchor"><a href="#contactUs"> Contact Us </a></span>
	    </div>

	    <div>
		<?php
		if(!isset($_SESSION['username'])) {
                echo '

		<div class="indexCard">
		    <form action="#" method="post">
			<div align="center">
			    <h3>Register Here</h3>
			</div>
			
			<div align="center" class="regForm">
			    
			    <span>
				Registration Number: <br>
			    </span>

			    <span>
				<input type="number" name="regid" id="regid" placeholder="Enter Your Registration Number" required="yes"/>	
				<span class="error"><br></span>
				<br>
			    </span>

			    <span>
				First-Name: <br>
			    </span>

			    <span>
				<input type="text" name="fname" placeholder="Enter your First Name" required="yes"/>
				<span class="error"><br>'. $error_name .'</span>
			    </span>

			    <span>
				Last-Name:<br>
			    </span>

			    <span>
				<input type="text" name="lname" placeholder="Enter your Last Name" required="yes"/ >
				<span class="error"> <br>'. $error_name .'</span>
			    </span>

			    <span>
				Username:<br>
			    </span>

			    <span>
				<input type="text" name="uname" placeholder="Enter your Username" required="yes"/>
				<br>
			    </span>

			    <span>
				Password:<br>
			    </span>

			    <span>
				<input type="password" name="pass1" placeholder="Enter Your password" required="yes"/>
				<span class="error"> </span>
				<br>
			    </span>

			    <span>
				Re-Type Password:<br>
			    </span>

			    <span>
				<input type="password" name="pass2" placeholder="Re-Enter Your password" required="yes"/>
				<span class="error">'.  $error_pass .'</span>
				<br>
			    </span>

			    <span>
			    	Branch:<br>
			    </span>

			    <span>
				<select name="branch" required="yes"/>
				    <option>CSE</option>
				    <option>CSE/IT</option>
				    <option>ETC</option>
				    <option>EEE</option>
				    <option>EE</option>
				    <option>MECH</option>
				    <option>CHEM</option>
				    <option>CIVIL</option>
				</select>
				<br>
			    </span>

			    <span>
				Email: <br><input type="text" name="email" placeholder="Enter your email" required="yes"/>
				<span class="error">'. $error_email  .'</span>
			    </span>

			    <span>			    
				Contact: <br> <input type="text" name="phno" placeholder="Enter your  Phone Number" required="yes"/>
				<br>
			    </span>

			    <span>
				Hostel: <br> <input type="radio" name="hostel" value="yes"> Yes
				<input type="radio" name="hostel" value="no"/> No
				<br/>
			    </span>
			</div>
			
			<div align="center">
			    <a href="../login/studentLogin.php"> Already have an account </a>  &nbsp;  &nbsp;
			    <input class="btn" type="submit" value="submit" name="submit">
			</div>
			
		    </form>

		</div>
		';
		}
		else {
                echo '
		<div class="logout" >
		    Welcome '. $_SESSION['username'] . ', 
		    <br/>
		    <br/>
		    <div class="logoutPanel">
			<span class="logoutBorder"> You seem to be '. $_SESSION['type']  .' </span> 
			<a href="./logout/logOutNext.php" class="logoutBtn"> Log Out </a>
		    </div>
		</div>
		';
		}
		?>

	    </div>

	</div>
	
	<div class="aboutUs" id="aboutUs">
	    So this seems to be a company, huh?
	</div>

	<div class="contactUs" id="contactUs">
	    So this seems to be a company, huh?
	</div>

	<!-- Let's react -->
	
    </body>
</html>
