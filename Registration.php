<?php

if(isset($_POST['signup'])){
	$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
			$utype = $_POST['utype'];
		
		if(empty($name)==true || empty($email)==true || empty($pass) == true ||empty($cpass) == true||empty($id) == true||empty($utype) == true ){
			echo "fill all!";
		}
		elseif ($pass!=$cpass) {
		echo "password doesn't match";	
		} else{
			if (checkUniqueValue($name)) {
				echo "Sorry. This username is already taken.";
				//header('location: Registration.php');
				
			
				//exit();
			}

			if (checkUniqueValue($email)) {
				echo "Sorry. This email has been used already.";
				//header('location: Registration.php');
				
				//exit();
			}
			else{
            $conn=mysqli_connect('localhost','root','','fwa');
			$sql="insert into info(id,pass,cpass,name,email,utype) values('{$id}','{$pass}','{$cpass}','{$name}','{$email}','{$utype}')";
			$set=mysqli_query($conn,$sql);
		header('location: signin.php');
		mysqli_close($conn);
}
	}
			}


			function checkUniqueValue($value){
				 $conn=mysqli_connect('localhost','root','','fwa');						

			$found = 0;
						$sql="select * from info where name='{$value}' or email='{$value}'";
			$get=mysqli_query($conn,$sql);
			$user=mysqli_fetch_assoc($get);
						if($user["name"] == $value){
							$found = 1;

						}
						if($user["email"] == $value){
							$found = 1;
						}
					
			return $found;
		}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="verify.js"></script>
</head>
<body>
	<center>
	<form method="POST" name="f1" onsubmit="return valid();" action="Registration.php">
			
			<legend><b>REGISTRATION<br><hr width="150"></b></legend>
			<table cellpadding="5px">
			<tr>
				<td>
			ID <br><input type="text" name="id" id="id" onkeyup="return fid(this);"><br><td><div id="em1"></div></td>

			</td>
			</tr>
			
			<tr>
				<td>
			Password <br><input type="password" name="pass" id="pass" value="" onkeyup="return fpass(this);">
			</td><br><td><div id="em2"></div></td>

			</tr>
			<tr>
				<td>
			Confirm Password<br><input type="password" name="cpass" id="cpass" value="" onkeyup="return fcpass(this);">
			</td><br><td><div id="em3"></div></td>
			</tr>
			
			<tr>
				<td>
			Name:<br><input type="text" name="name" id="name" value="" onkeyup="return fname(this);">
			</td><br><td><div id="em4"></div></td>
			</tr>
			<tr>
				<td>
			Email:<br><input type="email" name="email" id="email" value="" onkeyup="return fmail(this);">
			</td>
			<br><td><div id="em5"></div></td>
			</tr>
			<tr>
				<td>
			<select name="utype">
			<option value="Type">Type</option>
			<option value="Admin">Admin</option>
  <option value="User">User</option>
  </select>
			</td>
			</tr>
			
			<tr>
			<td style="border-top:1px solid #888;">
			<input type="submit" name="signup" value="Sign Up"/><br>

			Already a menmber? <a href="signin.php">Sign In</a>
			</td>
			</tr>
			
			</table>

			


	</form>


</body>
</html>