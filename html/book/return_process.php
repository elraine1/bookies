<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/login/session.php");
	
	start_session();
	
	// 로그인상태일때만 작동(운영자모드 아닐때)
	if(isset($_SESSION['login_status']) && ($_SESSION['login_status'] == true) 
	&& isset($_SESSION['admin_mode']) && ($_SESSION['admin_mode'] == false)){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$checkbox_list = $_POST['return_list'];
			$username = $_SESSION['username'];
			
			$return_list = array();	
			for($i=0; $i < count($checkbox_list); $i++){
				$return_list[] = $checkbox_list[$i];
			}
			return_in_list($return_list, $username);
			
			printf("<script>");
			printf("	alert('반납 완료');");
			printf("	window.location = '../index.php';");			//// 에러~!!!!! 
			printf("</script>");
		}
	}else {
		printf("<script>");
		printf("	alert('로그인 후 이용해주세요.');");
		printf("	window.location = '../index.php'");
		printf("</script>");
	}
?>