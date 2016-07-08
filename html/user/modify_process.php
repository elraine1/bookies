<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 	
	$mylib_path = $_SERVER['DOCUMENT_ROOT'] . '../../includes/mylib_bookies.php';
	require_once($mylib_path);
		
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$userinfo['username'] = $_POST['username'];
		$userinfo['age'] = $_POST['age'];
		$userinfo['gender'] = $_POST['gender'];
		$userinfo['address'] = $_POST['address'];
		$userinfo['email'] = $_POST['email'];
		$userinfo['phone'] = $_POST['phone'];
			 //작성자, 제목, 컨텐츠 중 내용이 하나라도 빠지면 die.
		if( $userinfo['age'] == ''|| $userinfo['gender'] == ''|| $userinfo['address'] == ''|| $userinfo['email'] == ''|| $userinfo['phone'] == ''){
			die('빈칸을 모두 채워주세요.');
		}
		modify_userinfo($userinfo);
	}
	header('Location: user_profile.php');
	
?>