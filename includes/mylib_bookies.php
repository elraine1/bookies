<?php
	function get_mysql_conn(){
		$hostname='kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
		$username='bookies';
		$password='bookies';
		$dbname='bookies';
		
		$conn=mysqli_connect($hostname, $username, $password, $dbname);
		mysqli_query($conn, "SET NAMES 'utf8'");
		if (!($conn)) {
			die('Mysql connection failed: '.mysqli_connect_error());
		} 
		return $conn;
	}
	
	
	function get_user_info($username){						
		$conn = get_mysql_conn();
		$stmt = mysqli_prepare($conn, "SELECT username,name,age,gender,address,email,phone FROM member WHERE username = ?");
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		
		$userinfo = array();
		$userinfo['username'] = $row["username"];
		$userinfo['name'] = $row["name"];
		$userinfo['age'] = $row["age"];
		$userinfo['gender'] = $row["gender"];
		$userinfo['address'] = $row["address"];
		$userinfo['email'] = $row["email"];
		$userinfo['phone'] = $row["phone"];
		
		return $userinfo;
	}
	
	
	
	
?>