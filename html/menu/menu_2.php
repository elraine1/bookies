<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
	<title>Hello, Bookies!</title>
	<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">
	<style type="text/css">
		table{
			margin-left: 25px;
		}
		table, tr, th, td{
			border: 1px solid red;
			border-collapse: collapse;
			text-align:center;
		}
		th{
			background-color: salmon;
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
				require_once ($_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php");
				$conn = get_mysql_conn();
				$new_book = get_new_book();
				
					printf("<div>");
					printf("<h2> 신 간</h2><br>");
					printf("<table id='new_book'>");
					printf("<tr><th>제목</th><th>작가</th><th>출간일</th><th>출판사</th><th>언어</th><th>가격</th>
							<th>대여료</th><th>연령제한</th><th>장르</th><th>책종류</th><th>대여상황</th><th>입고일</th></tr>");
					
					
					for($i=0; $i<count($new_book); $i++){
						printf("<tr>");
						printf("<td>%s</td>", $new_book[$i]['title']);
						printf("<td>%s</td>", $new_book[$i]['author']);
						printf("<td>%s</td>", $new_book[$i]['published_date']);
						printf("<td>%s</td>", $new_book[$i]['publisher']);
						printf("<td>%s</td>", $new_book[$i]['lang']);
						printf("<td>%d</td>", $new_book[$i]['price']);
						printf("<td>%d</td>", $new_book[$i]['fee']);
						printf("<td>%s</td>", $new_book[$i]['age_limit']);
						printf("<td>%s</td>", $new_book[$i]['genre']);
						printf("<td>%s</td>", $new_book[$i]['booktype']);
						printf("<td>%s</td>", $new_book[$i]['status']);
						printf("<td>%s</td>", $new_book[$i]['update_date']);
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