<?php

session_start();
if(isset($_COOKIE['uname'])){

?>


<!DOCTYPE html>
<html>
<head>
	<title>User</title>
</head>
<body align="center">
	
		<h1>Welcome Home!!!<br><?= $_SESSION['uname']?> </h1>
		
		<a href="profile.php">Profile</a><br>
		<a href="viewinfo.php">View Info</a><br>
		<a href="logout.php">Logout</a><br>
		

</body>



</html>

<?php
}
else{
	header('location:signin.php');
}
?>
