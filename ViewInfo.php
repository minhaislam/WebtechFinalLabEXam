<?php
session_start();
		
		if(isset($_POST['Add'])){
		
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
		$utype =$_POST["utype"];

		
		if(empty($uname)==true || empty($email)==true || empty($pass) == true ||empty($cpass) == true ||empty($utype) == true){
			echo "fill all!";
		} elseif ($pass!=$cpass) {
			echo "password doesn't match";	
		}
		 else{
			if (checkUniqueValue($uname)) {
				echo "Sorry. This uname is already taken.";
				exit();
			}

			if (checkUniqueValue($email)) {
				echo "Sorry. This email has been used already.";
				exit();
			}

           else{
            $conn=mysqli_connect('localhost','root','','fwa');
			$sql="insert into info(email,pass,cpass,uname,utype) values('{$email}','{$pass}','{$cpass}','{$uname}','{$utype}')";
			$set=mysqli_query($conn,$sql);
		header('location: viewinfo.php');
		mysqli_close($conn);
				}
		}
}
elseif (isset($_POST['Update'])) {
			//header('location: AdminHome.php');
	$uname = $_POST['uname'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
		//$utype =$_POST["utype"];
		$id =$_POST["id"];

		
		if(empty($id)==true){
			echo "ID required!";
		} elseif ($pass!=$cpass) {
			echo "password doesn't match";	
		}
		 if (empty($email)==false) 
		 	{
			if (checkUniqueValue($email)) {
				echo "Sorry. This email is already taken.";
				exit();
			}


           else{
            $conn=mysqli_connect('localhost','root','','fwa');
			$sql="update info SET email='{$email}' where id='{$id}'";
			$set=mysqli_query($conn,$sql);
		header('location: viewinfo.php');
		mysqli_close($conn);
				}
		}

		 if (empty($uname)==false) 
		 	{
			if (checkUniqueValue($uname)) {
				echo "Sorry. This uname is already taken.";
				exit();
			}

			//if (checkUniqueValue($email)) {
			//	echo "Sorry. This email has been used already.";
			//	exit();
			//}

           else{
            $conn=mysqli_connect('localhost','root','','fwa');
			$sql="update info SET uname='{$uname}' where id='{$id}'";
			$set=mysqli_query($conn,$sql);
		header('location: viewinfo.php');
		mysqli_close($conn);
				}
		}

		 if (empty($pass)==false && empty($cpass)==false) 
		 	{
          if($pass==$cpass){
            $conn=mysqli_connect('localhost','root','','fwa');
			$sql="update info SET pass='{$pass}',cpass='{$cpass}' where id='{$id}'";
			$set=mysqli_query($conn,$sql);
		header('location: viewinfo.php');
		mysqli_close($conn);
				}
		}

	}
	elseif (isset($_POST['Delete'])) {
		$id =$_POST["id"];

		
		if(empty($id)==true){
			echo "ID required!";
		}
		else{
			$con=mysqli_connect('localhost','root','','fwa');
			$sql="DELETE from info where id='{$id}'";
			$set=mysqli_query($con,$sql);
			header('location: viewinfo.php');
		mysqli_close($conn);
			
		}
		}
		if(isset($_GET['id'])) { 
				$id = $_GET['id'];
				$_SESSION['id']=$id;
$con=mysqli_connect('localhost','root','','fwa');
			$sql="DELETE from info where id='$id'";
			$set=mysqli_query($con,$sql);
			header('location: viewinfo.php');
		mysqli_close($conn);
}


		
elseif (isset($_POST['Back'])) {
			header('location: AdminHome.php');
		}
		
	


		function checkUniqueValue($value){
				 $conn=mysqli_connect('localhost','root','','fwa');						

			$found = 0;
						$sql="select * from info where uname='{$value}' or email='{$value}'";
			$get=mysqli_query($conn,$sql);
			$user=mysqli_fetch_assoc($get);
						if($user["uname"] == $value){
							$found = 1;

						}
						if($user["email"] == $value){
							$found = 1;
						}
					
			return $found;
		}
		

		
		
if(isset($_COOKIE['uname'])){

?>



<!DOCTYPE html>
<html>
<head>
	<title>
		Info table
	</title>
</head>
<body>
	<table>
	<center>
	<tr>
						
						
						<td width="100px"><a href="viewinfo.php">View Info</a></td>
						<br>
						<a href = "logout.php"><h3>LogOut</h3></a></td>
					</tr>
					
					 <tr>
                        <td colspan="11" style="border-top:4px solid #888;"></td>
                    </tr>
					
		
	
	</table></center>

<center>
	<table border="1">
		<thead>
		<tr>
			<th>ID</th>
			<th>Email</th>
			<th>Password</th>
			<th>User Name</th>				
			<th>User Type</th>
		</tr>	
          </thead>

          <tbody>
          	   <?php
          	  $conn=mysqli_connect('localhost','root','','fwa');
			$sql="select * from info";
			$get=mysqli_query($conn,$sql);
			
   if(count($get)>0){
	while ($user=mysqli_fetch_assoc($get)) {
	
	?>
					<tr>
						<td><?php echo $user["id"];?></td>
		          		<td><?php echo $user["email"];?></td>
		          		<td><?php echo $user["pass"];?></td>
		          		<td><?php echo $user["uname"];?></td>
		          		<td><?php echo $user["utype"];?></td>
		          		 <td> <a href="ViewInfo.php?id=<?php echo $user['id'];?>">Delete</a>|<a href="edit.php?id=<?php echo $user['id'];?>"/>Edit</a></td>

		          	</tr>
		         	

    <?php
    		}
    	}
	
	?>	

          </tbody>	
        


	</table>
	</center>

	<form method="POST" action="">
		<fieldset>	\
		
			<legend><b>Edit Info</b></legend>
			<table cellpadding="5px">
			<tr>
					<td>
			Id:<br><input type="text" name="id" value="">
			</td>
				<td>
			Username:<br><input type="text" name="uname" value="">
			</td>
			
			
				<td>
			Email:<br><input type="email" name="email" value="">
			</td>
			
			
				<td>
			Password <br><input type="password" name="pass" value="">
			</td>
			
			
				<td>
			Confirm Password<br><input type="password" name="cpass" value="">
			</td>
			

			
			<td>
			<input type="radio" name="utype" value="User"/>User <br>
			<input type="radio" name="utype" value="Admin"/>Admin
			
			</td>
			
			
			
			<tr>
			<td style="border-top:1px solid #888;">
			<input type="submit" name="Add" value="Add"/>
			<input type="submit" name="Update" value="Update"/>
			<input type="submit" name="Delete" value="Delete"/>
			</td>
			</tr>

			
			</table>

			

		</fieldset>	
		

	</form>
<form method="POST" action="">
	<table>
				<tr>
				<td>
				<input type="submit" name="Back" value="Back" method="POST" action=""/>
				</td>
			</tr>
			</table>

</form>

</body>
</html>
<?php
}
else{
	header('location:signin.php');
}
?>