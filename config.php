 <?php
 $db_name="smbdu8tr_engigyan1";
 $mysql_username="smbdu8tr_hello";
 $mysql_password="aakash@1234";
 $server_name="111.118.215.77";
 $conn = mysqli_connect($server_name,$mysql_username,$mysql_password,$db_name);

 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

 ?>
