<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
	<title>Hello, Bookies!</title>
	<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">
	
	<style type="text/css">
		table, tr, th, td{
			border: 1px solid red;
			border-collapse: collapse;
			border-
		}
	
	</style>

</head>

<body>  
<?php 
	require_once $_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php";

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
				<h2> 도서 목록</h2><br>
				
				<?php
					$bookcase = get_bookcase();
				
					printf("<table>");
					printf("<tr><th>번호</th><th>타입</th><th>장르</th><th>제목</th><th>연령제한</th><th>도서정가</th><th>대여료</th><th>출판사</th></tr>");
					for($i=0; $i<count($bookcase); $i++){
						
						printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%s</td></tr>", 
						$bookcase[$i]['book_id'], $bookcase[$i]['booktype'], $bookcase[$i]['genre'], $bookcase[$i]['title'], $bookcase[$i]['age_limit'], $bookcase[$i]['price'], $bookcase[$i]['fee'], $bookcase[$i]['publisher']);
					}
					printf("</table>");
					
					
					
					
				?>
			</div>
			
		</div>
		
	<?php
		require_once($DOCUMENT_ROOT . "/template/footer.php");
	?>		
	</div>
</body>

  
</html>