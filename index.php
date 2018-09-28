<?php
session_start();
?>
<html>
    <head>
	<title> Home </title>
	<link rel="stylesheet" href="styles.css" >
    </head>

    <body>
	<div class="background">
	    <!-- <span class="logo"> @ </span> -->
	    <div class="navbar">
		<br/> <br/>
		<span class="logo"> @ </span>
 		
		<span class="homeAnchor"><a href="#">  Home </a> </span> &nbsp; &nbsp;
		<?php
		if(isset($_SESSION['username'])) {
		    if($_SESSION['type'] == 'a student') {
			echo '<span class="registerAnchor"><a href="./complaint/showComp.php"> Show-Complaints </a> </span>  &nbsp; &nbsp;';
			echo '<span class="registerAnchor"><a href="./complaint/addComplaint.php"> Add-Complaints</a> </span>  &nbsp; &nbsp;';
		    }
		    else if($_SESSION['type'] == 'a faculty') {
			echo '<span class="registerAnchor"><a href="./mentor/addStudent.php"> Add-Students </a> </span>  &nbsp; &nbsp;';
		    }
		    else if($_SESSION['type'] == 'an admin') {
			echo '<span class="registerAnchor"><a href="./superuser/showAllComp.php"> Show-All-Complaints </a> </span>  &nbsp; &nbsp;';
		    }
		    else if($_SESSION['type'] == 'an authority') {
			// authority links here
		    }
		    else {
		    }
		}
		    else {
			echo '<span class="registerAnchor"><a href="./register/studentRegister.php"> Student-Register </a> </span>  &nbsp; &nbsp;';
		    }
		?>
		<span class="aboutAnchor"><a href="#aboutUs"> About Us </a> </span>  &nbsp; &nbsp;
		<span class="contactAnchor"><a href="#contactUs"> Contact Us </a></span>	      
	    </div>

	    <?php
	    if(!isset($_SESSION['username'])) {
                echo '
	  <div class="workframe" border="1">
	      <span class="indexCard">
		  <p align="center" class="label"> STUDENT </p> 
		  <img src="./assets/login_student.svg" alt="student login" title=" student login" />
		  <a href="./login/studentLogin.php" class="btn" ><br/> Log In </a>
	      </span>
	      <span class="indexCard">
		  <p align="center" class="label"> FACULTY </p> 
		  <img src="./assets/login_faculty.svg" alt="faculty login" title=" faculty login" />
		  <a href="./login/facultyLogin.php" class="btn" > <br/> Log In </a>
	      </span>
	      <span class="indexCard">
		  <p align="center" class="label"> AUTHORITY </p> 
		  <img src="./assets/login_admin.svg" alt=" authority/admin login" title=" authority/admin login" />
		  <a href="./login/adminLogin.php" class="btn" > <br/> Log In </a>
	      </span>
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
	
	<div class="aboutUs" id="aboutUs">
	    So this seems to be a company, huh?
	</div>

	<div class="contactUs" id="contactUs">
	    So this seems to be a company, huh?
	</div>

	<!-- Let's react -->
	
    </body>
</html>
