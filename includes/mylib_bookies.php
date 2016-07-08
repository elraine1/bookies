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
	
	function get_member_list(){
		
		$member_list = array();
		
		$conn = get_mysql_conn();
		$stmt = mysqli_prepare($conn, "SELECT * FROM member ORDER BY grade_id");
		mysqli_stmt_execute($stmt);
		
		$i = 0;
		$result = mysqli_stmt_get_result($stmt);
		while($member = mysqli_fetch_assoc($result)){
			$member_list[$i]['mem_id'] = $member['mem_id'];
			$member_list[$i]['grade_id'] = $member['grade_id']; // 추후 등급명으로 변경.
			$member_list[$i]['username'] = $member['username'];
			$member_list[$i]['name'] = $member['name'];
			$member_list[$i]['age'] = $member['age'];
			$member_list[$i]['gender'] = $member['gender'];
			$member_list[$i]['phone'] = $member['phone'];
			$member_list[$i]['email'] = $member['email'];
			
			$i++;
		}
		
		return $member_list;
	}
	
	
?>