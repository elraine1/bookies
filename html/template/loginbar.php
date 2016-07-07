<style type="text/css">
	form{
		display:inline-block;
	}
</style>

	<div id="div_loginbar">
	<?php 
		$SESSION_PATH = $_SERVER['DOCUMENT_ROOT'] . '/login/session.php';
		require_once($SESSION_PATH);
		start_session();
		
		if(isset($_SESSION['login_status']) && ($_SESSION['login_status'] === true)){
			printf("<b>%s</b> 님 반갑습니다.", $_SESSION['name']);			// 로그인시 이름 외 추가 정보 출력 여부 고민해볼 것.
		}else {
	?>
		<form action="../login/login.php" method="post">
			<b>ID: </b><input type="text" name="username"> 
			<b>PW: </b><input type="password" name="password"> 
	
			<input type="submit" value="로그인"> 
		</form>
		<a href="../login/register_page.php"><button>회원가입</button></a>	
	</div>

<?php 
	}
?>