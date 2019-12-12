<?php
	
	require_once('db.php');
	$term = $_POST['key'];
	$con = getConnection();
	$sql = "select id from info where id='{$term}'";
	$result = mysqli_query($con, $sql);
	$row = "";
	$data = mysqli_fetch_assoc($result);
		$row .= $data['id'];
	if (!empty($row)) {
		echo "id exists";
	}
	else{
		echo "doesn't exist";
	}
	
?>