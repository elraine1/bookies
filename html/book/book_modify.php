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
					$book_id = $_GET['book_id'];
					
					$book = get_book_info($book_id);
										
				
					printf("<h1>책정보 수정</h1>");
				
					
					printf("<form action='book_modify_process.php' method='post'>");
					printf("<table id='book_table'>");
					printf("<tr><th><b>번호 :</b></th><td><input type='text' value='%d' name='book_id' readonly></td></tr>",$book['book_id']);
					printf("<tr><th><b>제목 :</b></th><td><input type='text' value='%s' name='title'></td></tr>",$book['title']);
					printf("<tr><th><b>장르 :</b></th><td><input type='text' value='%s' name='genre'></td></tr>",$book['genre']);
					printf("<tr><th><b>연령제한 :</b></th><td><input type='text' value='%s' name='age_limit'></td></tr>",$book['age_limit']);
					printf("<tr><th><b>정가 :</b></th><td><input type='text' value='%d' name='price'></td></tr>",$book['price']);
					printf("<tr><th><b>대여료 :</b></th><td><input type='text' value='%d' name='fee'></td></tr>",$book['fee']);
					printf("<tr><th><b>종류 :</b></th><td><input type='text' value='%s' name='booktype'></td></tr>",$book['booktype']);
					printf("<tr><th><b>출판사 :</b></th><td><input type='text' value='%s' name='publisher'></td></tr>",$book['publisher']);
					printf("<tr><th><b>출판일 :</b></th><td><input type='text' value='%d' name='published_date'></td></tr>",$book['published_date']);
					printf("<tr><td colspan='2' align='center'><input type='submit' value='완료'></td></tr>");
					printf("</table>");
					printf("</form>");
					
					
					
				?>
				
			</div>
			
		</div>
		
	<?php
		require_once($DOCUMENT_ROOT . "/template/footer.php");
	?>		
	</div>
</body>



</html>