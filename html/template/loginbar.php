

	<div id="div_loginbar">
	<?php 
		$SESSION_PATH = $_SERVER['DOCUMENT_ROOT'] . '/login/session.php';
		require_once($SESSION_PATH);
		start_session();
		
		$_SESSION['request_uri'] = $_SERVER["REQUEST_URI"];
	
		if(isset($_SESSION['login_status']) && ($_SESSION['login_status'] === true)){
		//	printf("<span><b>%s</b> 님 반갑습니다.</span>", $_SESSION['name']);			// 로그인시 이름 외 추가 정보 출력 여부 고민해볼 것.
		echo "<tr>";
		printf("<form id='login_form' action='../user/user_profile.php' method='post'>");
		printf("<span><b>%s</b> 님 환영합니다. </span>", $_SESSION['name']);
		printf("<input type='submit' value='내정보보기'>");	
		printf("</form>");
		printf("<a href='../login/logout.php'>&nbsp<button class='loginbar_btn'>로그아웃</button></a>");
		echo "</tr>";
		
		}else {
	?>
		<form action="../login/login.php" method="post" id='login_form'>
			<b>ID: </b><input type="text" name="username"> 
			<b>PW: </b><input type="password" name="password"> 
	
			<input type="submit"  value="로그인" > 
		</form>
		<a href="../login/register_page.php"><button class="loginbar_btn">회원가입</button></a>	
	</div>

<?php 
	}
?>