<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<?php 	
	require_once '../login/session.php';
	require_once $_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php";
	
	start_session();
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$book_id = $_GET['book_id'];
	}
	delete_book($book_id);
	


?>
	
	<script type='text/javascript'>
	//var request_uri = <?php echo $_SESSION['request_uri'] ?>;
	alert('삭제가 완료되었습니다.');
	window.location = "../index.php";
	</script>


</body>
</html>