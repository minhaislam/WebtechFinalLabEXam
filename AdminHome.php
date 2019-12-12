<?php

session_start();
if(isset($_COOKIE['uname'])){

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body align="center">
	
		
		<table  style="border-bottom:1px solid #888;">
			<thead>
				<tr>
				
					<td align="center" width="500"><h1>Welcome Home!!! <?php echo $_SESSION['uname'];?> </h1></td>

<td><a href="viewinfo.php">View Info</a><br></td>
		<td><a href="logout.php">Logout</a><br></td>
		
	</td>

	<td style="border-top:1px solid #888;" colspan="8"></td>


				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					
		
		<td></td>
		</tr>
		</tbody>
</table>
</body>



</html>

<?php
}
else{
	header('location:signin.php');
}
?>
