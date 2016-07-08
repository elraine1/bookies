<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">
<body>
	<div class="wrap">
	<?php 
		$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
		require_once($DOCUMENT_ROOT . "/template/loginbar.php"); 
		require_once($DOCUMENT_ROOT . "/template/header.php");
	?>
		
		<div class="content_wrap">		
		<?php 
			require_once($DOCUMENT_ROOT . "/template/menu.php");
		?>		

			<div id="content">
				<?php
					require_once ($_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php");
					$username = $_SESSION['username'];

					$userinfo = get_user_info($username);
										
					printf("<div id='userinfo_div'>");
					printf("<h1>정보 수정 양식!</h1>");
					printf("<h3>내 정보를 수정해졍!!</h3>");	
					printf("<form action='#' method='post'>");
					printf("<table id='userinfo_table'>");
					printf("<tr><th><b>아이디 :</b></th><td>%s</td></tr>",$userinfo['username']);
					printf("<tr><th><b>이름 :</b></th><td>%s</td></tr>",$userinfo['name']);
					printf("<tr><th><b>나이 :</b></th><td><input type='text' value='%d'></td></tr>",$userinfo['age']);
					printf("<tr><th><b>성별 :</b></th><td><input type='text' value='%s'></td></tr>",$userinfo['gender']);
					printf("<tr><th><b>주소 :</b></th><td><input type='text' value='%s'></td></tr>",$userinfo['address']);
					printf("<tr><th><b>이메일 :</b></th><td><input type='text' value='%s'></td></tr>",$userinfo['email']);
					printf("<tr><th><b>연락처 :</b></th><td><input type='text' value='%s'></td></tr>",$userinfo['phone']);
					printf("<tr><td colspan='2' align='center'><input type='submit' value='이대로 바꿔졍!'></td></tr>");
					printf("</table>");
					printf("</form>");
					printf("<br><a href='/index.php'><button>집으로 가자!!</button></a><br>");
					printf("</div>");
					
				?>
				
			</div>
			
		</div>
		
	<?php
		require_once($DOCUMENT_ROOT . "/template/footer.php");
	?>		
	</div>
</body>



</html>