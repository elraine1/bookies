<?php 
	$SESSION_PATH = $_SERVER['DOCUMENT_ROOT'] . '/login/session.php';
	require_once($SESSION_PATH);
	start_session();
	
	if(isset($_SESSION['login_status']) && ($_SESSION['login_status'] === true)){
		
	}else {
?>

	<div id="div_loginbar">
		<form action="../login/login.php" method="post">
			<b>ID: </b><input type="text" name="username"> 
			<b>PW: </b><input type="password" name="password"> 
	
			<input type="submit" value="로그인"> 
			<a href="/../login/register_page.php"><button>회원가입</button></a>
		</form>
	</div>

<?php 
	}
?>