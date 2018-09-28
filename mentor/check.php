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

	<style type="text/css">
	 .disp{
	     width: 80%;
	     background-color: #F0FFF0;
	 }
	 .inner-disp{
	     width: 100%;
	     text-align: center;
	     background-color: #E0FFFF;
	 }
	 #seen{
	     float: right;
	 }

	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
	 function fun1(){
	     var to=document.getElementByName("forwardTo");
	     alert(to);
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
	    <?php
	    include("../config.php");
	    $empid=$_SESSION['empid'];

	    if(isset($_POST['option'])){
		$type=$_POST['option'];
	    }

	    if($type == 0){
		$domain = "other";
	    }elseif ($type == 1) {
		$domain = "hostel";
	    }elseif ($type == 2) {
		$domain = "dsw";
	    }elseif ($type == 3) {
		$domain = "placement";
	    }elseif ($type == 4) {
		$domain = "exam";
	    }elseif ($type == 5) {
		$domain = "food";
	    }else{
		$domain ="all";
	    }

	    $sqlpos="SELECT `empId`, `name`,`domain` FROM `employee` WHERE `domain`='$domain'";
	    $resultpos=mysqli_query($conn,$sqlpos);
	    
	    

	    $sql1="SELECT REGID FROM `users` WHERE `mentor_id` =  '$empid'  and `CONFIRMED` = 1";
	    $array = array();
	    $result=mysqli_query($conn,$sql1);
	    if (mysqli_num_rows($result) > 0) {
	    	// output data of each row
	   	while($row = mysqli_fetch_assoc($result)) {
	   	    $array[] = $row['REGID'];
	   	}
	    }
	    foreach ($array as $regid) {
		$sql2="SELECT  `complaint_id`,`user_id`, `description`, `type`, `is_resolved`, `created_at`, `title`, `mentor_seen` FROM `complaints` WHERE `user_id` = $regid and `type` = $type ";
		$result=mysqli_query($conn,$sql2);
		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
			$compId=$row["complaint_id"];
			$regn=$row["user_id"];
			$title=$row["title"];
			$desc=$row["description"];
			$date=$row["created_at"];
			$seen=$row["mentor_seen"];
			// $arr1 = array();
			// if (mysqli_num_rows($resultpos) > 0) {
			// 					echo "<select name='forwardTo'>";

			
   			// 			while($row1 = mysqli_fetch_assoc($resultpos)) {
   			// 				echo "<option value=".$row1['empId']."> " .$row1['name']."</option>";
	   		

		 	// }

			// 		echo "</select>";		
 			// }
	   		
	    ?>
	    <div class="disp">
		<div class="inner-disp">
		    <span><h3><?php echo $title; ?></h3></span>
		</div>
		<span><b>Date: </b><?php echo $date; ?><br></span>
		<span><b>Regn No:</b><?php echo $regn; ?><br></span>
		<span><b>Description:</b><?php echo $desc; ?></span>
		
		<span id="seen"><input type="checkbox" name="seen" 
				       <?php 
				       if($seen == 1){
					   echo "checked";
				       }else{
					   echo "";
				       }

				       ?>

				><b> Seen</b><br></span>

	    </div>
	    <br>
				<?php

				}
				}
				}

				?>

				<a href="addStudent.php"> << Back to previous page </a>
	</div>
	
	<div class="aboutUs">
	    So this seems to be a company, huh?
	</div>

	<div class="contactUs" id="contactUs">
	    So this seems to be a company, huh?
	</div>

	
	<script>
	 $('#seen').click(function(){
	     if ($(this).is(':checked')){
		 <?php
		 $querry="UPDATE `complaints` SET `mentor_seen`=0 WHERE `complaint_id`=$compId ";
		 if ($conn->query($querry) === TRUE) {
		     echo "Record updated successfully";
		 } else {
		     echo "Error updating record: " . $conn->error;
		 }


		 ?>
	     }
	     else{
		 <?php
		 $querry="UPDATE `complaints` SET `mentor_seen`=1 WHERE `complaint_id` =$compId";

		 if ($conn->query($querry) === TRUE) {
		     echo "Record updated successfully";
		 } else {
		     echo "Error updating record: " . $conn->error;
		 }


		 ?>
	     }
	 });
	</script>
	
    </body>
</html>
