<?php
session_start();
include("../config.php");
?>

<html>
    <head>
	<title> Add Students </title>
	<link rel="stylesheet" href="../styles.css" >
	<link rel="stylesheet" href="mentorStyles.css">
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

	    <form action="" method="post">
		<label for="regid"><h2>Select Registration Number</h2></label><br>
		<?php
		$sql="SELECT `REGID`, `USERNAME` FROM `users` WHERE `mentor_id` = 0 AND `CONFIRMED` = 1";

		$result=mysqli_query($conn,$sql);
		
		if(mysqli_num_rows($result) > 0)
		{
		    echo "<select name='regid'>";
		    while ($row = mysqli_fetch_assoc($result)) {
			echo "<option value=".$row['REGID']."> " .$row['REGID']."</option>";
		    }
		    echo "</select>";
		}
		else{
		    echo "<option>'0 Results'</option>";
		}
		?>
		<input type="submit" name="add" value="Add Student">
	    </form>

	    <div class="complaintGrid" align="center">
		<form action="check.php" method="post">
		    <input type="hidden" name="option" value="5"/>
		    <input type="image"  src="../assets/food.png"/> 
		</form>
		<form action="check.php" method="post">
		    <input type="hidden" name="option" value="1"/>
		    <input type="image"  src="../assets/hostel.png"/>
		</form>
		<form action="check.php" method="post">
		    <input type="hidden" name="option" value="4"/>
		    <input type="image"  src="../assets/exam.png"/>
		</form>
		<form action="check.php" method="post">
		    <input type="hidden" name="option" value="3"/>
		    <input type="image"  src="../assets/placement.png"/>
		</form>
		<form action="check.php" method="post">
		    <input type="hidden" name="option" value="2"/>
		    <input type="image"  src="../assets/dsw.png"/>
		</form>
		<form action="check.php" method="post">
		    <input type="hidden" name="option" value="0"/>
		    <input type="image"  src="../assets/others.png"/>
		</form>
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

<?php
if(isset($_POST['add'])){
    $regn=$_POST['regid'];

    $sql="UPDATE `users` SET `mentor_id`=?  WHERE `REGID` = ?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ss",$eid,$regn);
    if($stmt->execute())
	echo "Student Added successfully";
    else
	echo "failed";
}
?>
