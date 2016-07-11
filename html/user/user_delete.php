<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<?php 	
	require_once $_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php";

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$username = $_GET['username'];
	}
	
	delete_user($username);
	
	echo "<script>alert('삭제가 완료되었습니다.');
		window.location = '../login/logout.php';</script>";
	

	
	mysqli_close($conn);
	
?> 

</body>
</html>
