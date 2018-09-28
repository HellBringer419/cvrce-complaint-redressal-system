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

	    <table border="1" class="table">
		<h3> Hostel related complaints </h3>
		<tr class="header">
		    <th> Title </th>
		    <th> Description </th>
		    <th> Is it resolved? </th>
		    <th> DATE </th>
		    <th> Has the mentor seen it? </th>
		</tr>

		
		
		<?php
		include('../config.php');
		
		$regid=$_SESSION['regid'];
		$type = 1;

		$sql="SELECT  `description`,  `is_resolved`, `created_at`, `title`,  `position_seen`, `mentor_seen` FROM `complaints` WHERE `type` = 1 AND user_id =". $regid."";
		$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result) > 0)
		{
		    while ($row = mysqli_fetch_assoc($result)) {
			echo "
<tr>
<td>".$row['title'] . "</td>
		    <td>" . $row['description'] . "</td>
		    <td>" . $row['is_resolved'] . "</td>
		    <td>" . $row['created_at'] . "</td>
		    <td>" . $row['mentor_seen'] ."</td>
</tr>" ;
		    }
		}
		else{
		    echo "
<tr>
<td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
</tr>" ;
		    echo "<script> alert(' no Hostel complaints ') </script>" ;
		}
		?>
		
		
	    </table>
	    
	    <br/> <br/> <br/>
	    <a align="center" href="showComp.php" > See other types of complaints </a>
	    
	</div>
	
	<div class="aboutUs">
	    So this seems to be a company, huh?
	</div>

	<div class="contactUs" id="contactUs">
	    So this seems to be a company, huh?
	</div>

	
    </body>
</html>
