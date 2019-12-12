<?php


if(isset($_COOKIE['name'])){

?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body >
	
		<table border="1">
		<thead>
		<tr>
			<th>ID</th>
			
			<th>Password</th>
			<th>Email</th>
			<th>Name</th>				
			<th>User Type</th>
			<th></th>
		</tr>	
          </thead>

          <tbody>
          	   <?php
          	  $conn=mysqli_connect('localhost','root','','fwa');
			$sql="select * from info";
			$get=mysqli_query($conn,$sql);
			
   if(count($get)>0){
	$user=mysqli_fetch_assoc($get)) 
	
	?>
					<tr>
						<td><?php echo $user["id"];?></td>
						<td><?php echo $user["pass"];?></td>
		          		<td><?php echo $user["email"];?></td>
		          		<td><?php echo $user["name"];?></td>
		          		<td><?php echo $user["utype"];?></td>
		          		 
		          	</tr>
		         	

    <?php
    		}
    	}
	
	?>	

          </tbody>	
        


	</table>
	
</html>
<?php
}
else{
	header('location:signin.php');
}
?>