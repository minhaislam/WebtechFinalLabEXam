<?php
	session_start();
if(isset($_POST['login'])){
		$id = $_POST['id'];
		$pass = $_POST['pass'];
		
		
		if(empty($id) == true || empty($pass) == true){
			echo "fill all!";
		}
		else{
           
			$conn=mysqli_connect('localhost','root','','fwa');
			$sql="select * from info where id='{$id}' and pass='{$pass}'";
			$get=mysqli_query($conn,$sql);
			$user=mysqli_fetch_assoc($get);

		if(	count($user) >0){

				if($user["utype"]=='Admin'){
					setcookie("name", $user["name"], time()+3600, "/");
			$_SESSION['name']=$user["name"];
			header('location: AdminHome.php');

		}
		

		elseif($user["utype"]=='User'){
					setcookie("name", $user["name"], time()+3600, "/");
			$_SESSION['name']=$user["name"];
			header('location:UserHome.php');

		}
		
		}
		else{
		header('location:signin.php');
	}		

	}
	
	
	}


?>