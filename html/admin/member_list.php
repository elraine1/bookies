<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
	<title>Hello, Bookies!</title>
	<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">
	<style type="text/css">
		td, tr, th{
			border: 1px dotted red;
			border-collapse:collapse;		
		}
	</style>
</head>

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
					$member_list = get_member_list();
					
					printf("<div>");
					printf("<h2> 전체회원정보</h2><br>");
					printf("<table id='member_table'>");
					printf("<tr><th>회원번호</th><th>등급</th><th>아이디</th><th>이름</th><th>성별</th><th>나이</th>
							<th>연락처</th><th>메일주소</th></tr>");
					
					for($i=0; $i<count($member_list); $i++){
						printf("<tr>");
						printf("<td>%d</td>", $member_list[$i]['mem_id']);
						printf("<td>%d</td>", $member_list[$i]['grade_id']);
						printf("<td>%s</td>", $member_list[$i]['username']);
						printf("<td>%s</td>", $member_list[$i]['name']);
						printf("<td>%s</td>", $member_list[$i]['gender']);
						printf("<td>%s</td>", $member_list[$i]['age']);
						printf("<td>%s</td>", $member_list[$i]['phone']);
						printf("<td>%s</td>", $member_list[$i]['email']);
						printf("</tr>");
					}
					
					printf("</table>");
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