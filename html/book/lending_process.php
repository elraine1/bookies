<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/login/session.php");
	
	start_session();
	
	// 로그인상태일때만 작동(운영자모드 아닐때)
	if(isset($_SESSION['login_status']) && ($_SESSION['login_status'] == true) 
	&& isset($_SESSION['admin_mode']) && ($_SESSION['admin_mode'] == false)){
		
		$username = $_SESSION['username'];
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$lending = $_POST['lending'];	
			lending_in_list($lending, $username);
			
		}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
			
			$book_id = $_GET['book_id'];
			lending_book($book_id, $username);
		}
		
		printf("<script>");
		printf("	alert('대여 완료');");
		printf("	window.location = '../index.php';");			//// 에러~!!!!! 
		printf("</script>");
		
	}else {
		printf("<script>");
		printf("	alert('로그인 후 이용해주세요.');");
		printf("	window.location = '../index.php'");
		printf("</script>");
	}
?>