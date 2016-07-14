<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
	<title>Hello, Bookies!</title>
	<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">

</head>
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
			require_once ($_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php");
		?>		
		
			<div id="content">
				
				<?php
				
					$conn = get_mysql_conn();
					
					$best_book = get_best_book();
					
				printf("<div>");
					printf("<h2> 베스트 </h2><br>");
					printf("<table id='best_book'>");
					printf("<tr><th>랭크</th><th width='400'>제목</th><th>작가</th><th>출판사</th><th>언어</th>
							<th>대여료</th><th>연령제한</th><th>장르</th><th>책종류</th><th>총대여횟수</th></tr>");
					
					
					for($i=0; $i<count($best_book); $i++){
						printf("<tr>");
						printf("<td>%d</td>", $i+1);
						printf("<td><a href='../book/book_detail.php?book_id=%d'>%s</td></td>", $best_book[$i]['book_id'], $best_book[$i]['title']);
						printf("<td>%s</td>", $best_book[$i]['author']);
						printf("<td>%s</td>", $best_book[$i]['publisher']);
						printf("<td>%s</td>", $best_book[$i]['lang']);
						printf("<td>%d</td>", $best_book[$i]['fee']);
						printf("<td>%s</td>", $best_book[$i]['age_limit']);
						printf("<td>%s</td>", $best_book[$i]['genre']);
						printf("<td>%s</td>", $best_book[$i]['booktype']);
						printf("<td>%s</td>", $best_book[$i]['lending_count']);
						
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