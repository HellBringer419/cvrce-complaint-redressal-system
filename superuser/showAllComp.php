<?php
session_start();
include('../config.php');
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
	 <style>
	 body {font-family: Arial;}

	 /* Style the tab */
	 .tab {
	     overflow: hidden;
	     border: 1px solid #ccc;
	     background-color: #f1f1f1;
	 }

	 /* Style the buttons inside the tab */
	 .tab button {
	     background-color: inherit;
	     float: left;
	     border: none;
	     outline: none;
	     cursor: pointer;
	     padding: 14px 16px;
	     transition: 0.3s;
	     font-size: 17px;
	 }

	 /* Change background color of buttons on hover */
	 .tab button:hover {
	     background-color: #ddd;
	 }

	 /* Create an active/current tablink class */
	 .tab button.active {
	     background-color: #ccc;
	 }

	 /* Style the tab content */
	 .tabcontent {
	     display: none;
	     padding: 6px 12px;
	     border: 1px solid #ccc;
	     border-top: none;
	 }
	 table {
	     border-collapse: collapse;
	     border-spacing: 0;
	     width: 100%;
	     border: 1px solid #ddd;
	 }

	 th, td {
	     text-align: left;
	     padding: 16px;
	 }
	 tr:nth-child(even) {
	     background-color: #f2f2f2
	 }
	</style>

	</style>
	<script>
	 function focusOnForm() {
	     var form = document.getElementById('CompContainer');
	     form.style.display = '';
	     form.scrollIntoView();

	     var button = document.getElementById('hostelBtn');
	     button.click();
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
			echo '<span class="registerAnchor"><a href="./complaint/addComplaint.php"> Add-Complaints</a> </span>  &nbsp; &nbsp;';
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
	    <h2>All Complaints</h2>

	    <div class="tab">
		<button class="tablinks" onclick="openComplient(event, 'Hostel')" id="hostelBtn">Hostel</button>
		<button class="tablinks" onclick="openComplient(event, 'Food')">Food</button>
		<button class="tablinks" onclick="openComplient(event, 'DSW')">DSW</button>
		<button class="tablinks" onclick="openComplient(event, 'Placement')">Placement</button>
		<button class="tablinks" onclick="openComplient(event, 'Exam')">Exam</button>
		<button class="tablinks" onclick="openComplient(event, 'Other')">Others</button>
	    </div>

	    <div id="Hostel" class="tabcontent">
		<h3>Hostel</h3>

	  	<table>
	  	    <tr> <th> Regid</th> <th>Description</th> <th>Is Resolved</th> <th>Date</th> <th>Title</th>
	  		<th>Priority</th> <th>Position_seen</th> <th>Mentor Seen</th></tr>
	  	    <?php

	  	    //$sql="SELECT * FROM `complaints` WHERE `is_resolved` = 0 AND `type`=1";
	  	    $sql="SELECT `user_id`, `description`, `is_resolved`, `created_at`, `title`, `priority`, `position_seen`, `mentor_seen` FROM `complaints` WHERE `type`= 1";
	  	    $result = $conn->query($sql);

		    if ($result->num_rows > 0) {
    			// output data of each row
	    		while($row = $result->fetch_assoc()) {
	        	    echo "<tr><td> " . $row["user_id"] ."</td><td>". $row["description"] ."</td><td>". $row["is_resolved"]."</td><td>".  $row["created_at"] ."</td><td>". $row["title"] ."</td><td>" . $row["priority"]."</td><td>" . $row["position_seen"]."</td><td>" . $row["mentor_seen"] ."</td></tr>" ;
	    		}
		    } else {
    			echo "0 results";
    		    }
	  	    ?>
		</table>
	    </div>


	    <div id="Food" class="tabcontent">
		<h3>Food </h3>
	  	<table>
	  	    <tr> <th> Regid</th> <th>Description</th> <th>Is Resolved</th> <th>Date</th> <th>Title</th>
	  		<th>Priority</th> <th>Position_seen</th> <th>Mentor Seen</th></tr>
	  	    <?php

	  	    //$sql="SELECT * FROM `complaints` WHERE `is_resolved` = 0 AND `type`=1";
	  	    $sql="SELECT `user_id`, `description`, `is_resolved`, `created_at`, `title`, `priority`, `position_seen`, `mentor_seen` FROM `complaints` WHERE `type`= 5";
	  	    $result = $conn->query($sql);

		    if ($result->num_rows > 0) {
    			// output data of each row
	    		while($row = $result->fetch_assoc()) {
	        	    echo "<tr><td> " . $row["user_id"] ."</td><td>". $row["description"] ."</td><td>". $row["is_resolved"]."</td><td>".  $row["created_at"] ."</td><td>". $row["title"] ."</td><td>" . $row["priority"]."</td><td>" . $row["position_seen"]."</td><td>" . $row["mentor_seen"] ."</td></tr>" ;
	    		}
		    } else {
    			echo "0 results";
    		    }
	  	    ?>
	  	</table>
	    </div>


	    <div id="DSW" class="tabcontent">
		<h3>DSW</h3>
	  	<table>
	  	    <tr> <th> Regid</th> <th>Description</th> <th>Is Resolved</th> <th>Date</th> <th>Title</th>
	  		<th>Priority</th> <th>Position_seen</th> <th>Mentor Seen</th></tr>
	  	    <?php

	  	    //$sql="SELECT * FROM `complaints` WHERE `is_resolved` = 0 AND `type`=1";
	  	    $sql="SELECT `user_id`, `description`, `is_resolved`, `created_at`, `title`, `priority`, `position_seen`, `mentor_seen` FROM `complaints` WHERE `type`= 2 ";
	  	    $result = $conn->query($sql);

		    if ($result->num_rows > 0) {
    			// output data of each row
	    		while($row = $result->fetch_assoc()) {
	        	    echo "<tr><td> " . $row["user_id"] ."</td><td>". $row["description"] ."</td><td>". $row["is_resolved"]."</td><td>".  $row["created_at"] ."</td><td>". $row["title"] ."</td><td>" . $row["priority"]."</td><td>" . $row["position_seen"]."</td><td>" . $row["mentor_seen"] ."</td></tr>" ;
	    		}
		    } else {
    			echo "0 results";
    		    }
    		    
	  	    ?>
	  	</table>
	    </div>


	    <div id="Exam" class="tabcontent">
		<h3>Exam</h3>
	  	<table>
	  	    <tr> <th> Regid</th> <th>Description</th> <th>Is Resolved</th> <th>Date</th> <th>Title</th>
	  		<th>Priority</th> <th>Position_seen</th> <th>Mentor Seen</th></tr>
	  	    <?php

	  	    //$sql="SELECT * FROM `complaints` WHERE `is_resolved` = 0 AND `type`=1";
	  	    $sql="SELECT `user_id`, `description`, `is_resolved`, `created_at`, `title`, `priority`, `position_seen`, `mentor_seen` FROM `complaints` WHERE `type`= 4 ";
	  	    $result = $conn->query($sql);

		    if ($result->num_rows > 0) {
    			// output data of each row
	    		while($row = $result->fetch_assoc()) {
	        	    echo "<tr><td> " . $row["user_id"] ."</td><td>". $row["description"] ."</td><td>". $row["is_resolved"]."</td><td>".  $row["created_at"] ."</td><td>". $row["title"] ."</td><td>" . $row["priority"]."</td><td>" . $row["position_seen"]."</td><td>" . $row["mentor_seen"] ."</td></tr>" ;
	    		}
		    } else {
    			echo "0 results";
    		    }
    		    
	  	    ?>
	  	</table>
	    </div>


	    <div id="Placement" class="tabcontent">
		<h3>Placement</h3>
	  	<table>
	  	    <tr> <th> Regid</th> <th>Description</th> <th>Is Resolved</th> <th>Date</th> <th>Title</th>
	  		<th>Priority</th> <th>Position_seen</th> <th>Mentor Seen</th></tr>
	  	    <?php

	  	    //$sql="SELECT * FROM `complaints` WHERE `is_resolved` = 0 AND `type`=1";
	  	    $sql="SELECT `user_id`, `description`, `is_resolved`, `created_at`, `title`, `priority`, `position_seen`, `mentor_seen` FROM `complaints` WHERE `type`=3";
	  	    $result = $conn->query($sql);

		    if ($result->num_rows > 0) {
    			// output data of each row
	    		while($row = $result->fetch_assoc()) {
	        	    echo "<tr><td> " . $row["user_id"] ."</td><td>". $row["description"] ."</td><td>". $row["is_resolved"]."</td><td>".  $row["created_at"] ."</td><td>". $row["title"] ."</td><td>" . $row["priority"]."</td><td>" . $row["position_seen"]."</td><td>" . $row["mentor_seen"] ."</td></tr>" ;
	    		}
		    } else {
    			echo "0 results";
    		    }
	  	    ?>
	  	</table>
	    </div>


	    <div id="Other" class="tabcontent">
		<h3>Other</h3>
	  	<table>
	  	    <tr> <th> Regid</th> <th>Description</th> <th>Is Resolved</th> <th>Date</th> <th>Title</th>
	  		<th>Priority</th> <th>Position_seen</th> <th>Mentor Seen</th></tr>
	  	    <?php

	  	    //$sql="SELECT * FROM `complaints` WHERE `is_resolved` = 0 AND `type`=1";
	  	    $sql="SELECT `user_id`, `description`, `is_resolved`, `created_at`, `title`, `priority`, `position_seen`, `mentor_seen` FROM `complaints` WHERE `type`= 0";
	  	    $result = $conn->query($sql);

		    if ($result->num_rows > 0) {
    			// output data of each row
	    		while($row = $result->fetch_assoc()) {
	        	    echo "<tr><td> " . $row["user_id"] ."</td><td>". $row["description"] ."</td><td>". $row["is_resolved"]."</td><td>".  $row["created_at"] ."</td><td>". $row["title"] ."</td><td>" . $row["priority"]."</td><td>" . $row["position_seen"]."</td><td>" . $row["mentor_seen"] ."</td></tr>" ;
	    		}
		    } else {
    			echo "0 results";
    		    }
	  	    ?>
	  	</table>
	    </div>

	</div>
	
	<div class="aboutUs">
	    So this seems to be a company, huh?
	</div>

	<div class="contactUs" id="contactUs">
	    So this seems to be a company, huh?
	</div>

	<script>
	 function openComplient(evt, comp) {
	     var i, tabcontent, tablinks;comp
	     tabcontent = document.getElementsByClassName("tabcontent");
	     for (i = 0; i < tabcontent.length; i++) {
		 tabcontent[i].style.display = "none";
	     }
	     tablinks = document.getElementsByClassName("tablinks");
	     for (i = 0; i < tablinks.length; i++) {
		 tablinks[i].className = tablinks[i].className.replace(" active", "");
	     }
	     document.getElementById(comp).style.display = "block";
	     evt.currentTarget.className += " active";
	 }
	</script>
	
    </body>
</html>
