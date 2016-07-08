<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<?php 	
	$mylib_path = $_SERVER['DOCUMENT_ROOT'].'/../includes/mylib_bookies.php';
	require_once($mylib_path);
		
		$conn = get_mysql_conn();		
		
	
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$username = $_GET['username'];
		}
		
	
	$delete_query = sprintf("DELETE FROM member WHERE username='%s'", $username);
	
	if (mysqli_query($conn, $delete_query) === false) {
		die(mysqli_error($conn));
	}

	echo "<script>alert('삭제가 완료되었습니다.');
		window.location = '../login/logout.php';</script>";
	

	
	mysqli_close($conn);
	
?> 

</body>
</html>
