<?php 
	
	$hname = 'localhost';
	$uname = 'root';
	$pass = '';
	$db = 'hbwebsite';

	$con = mysqli_connect($hname,$uname,$pass,$db);

	if (!$con) {
		die("Cannot Connect to Database".mysqli_connect_error());
	}

	function filteration($data){
		foreach ($data as $key => $value) {
			$data[$key] = trim($value);
			$data[$key] = stripcslashes($value);
			$data[$key] = htmlspecialchars($value);
			$data[$key] = strip_tags($value);
		}
		return $data;
	}

	function select($sql,$values,$datatypes)
	{
		$con = $GLOBALS['con'];
		if ($stmt = mysqli_prepare($con,$sql)) {
			mysqli_stmt_bind_param($stmt,$datatypes,...$values);		
		}
		else{
			die("Query cannot be executed - Select");
		}
	}
 ?>