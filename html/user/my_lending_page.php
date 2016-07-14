<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
	<title>Hello, Bookies!</title>
	<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">

</head>

<body>  
	<?php
		require_once ($_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php");
	?>
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
					$username = $_SESSION['username'];
					printf("<h> 대여 현황(대여 정보) </h2><br>");
					printf("<b>%s </b>님께서 대여중인 목록은 다음과 같습니다. ", $username);
				
					
					$lending_list = get_my_lending_list($username);
					printf("<table>");
					printf("<tr><th>번호</th><th>도서명</th><th>대여일시</th><th>반납예정일</th><th>연체일</th></tr>");
					
					for($i=0; $i<count($lending_list); $i++){
						printf("<tr>");
						printf("<td>%d</td>", $i+1);
						printf("<td>%s</td>", $lending_list[$i]['title']);
						printf("<td>%s</td>", $lending_list[$i]['lend_date']);
						printf("<td>%s</td>", $lending_list[$i]['due_date']);
						printf("<td>%s</td>", $lending_list[$i]['delay']);
						printf("</tr>");
					}
				
					printf("</table><br><br>");
				
					printf("이용해주셔서 감사합니다.");
				
				?>
				
			</div>
			
		</div>
		
	<?php
		require_once($DOCUMENT_ROOT . "/template/footer.php");
	?>		
	</div>
</body>

  
</html>