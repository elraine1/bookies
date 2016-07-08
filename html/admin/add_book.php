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
				<h2>도서 등록</h2><br>
				<table>
					<tr><th>제목</th><td><input type="text" name="title"></td></tr>
					<tr><th>ISBN</th><td><input type="text" name="title"></td></tr>
					<tr><th>작가</th><td><input type="text" name="title"></td></tr>
					<tr><th>발행년월</th><td><input type="text" name="title"></td></tr>
					<tr><th>출판사</th><td><input type="text" name="title"></td></tr>
					<tr><th>언어</th><td><input type="text" name="title"></td></tr>
					<tr><th>가격</th><td><input type="text" name="title"></td></tr>
					<tr><th>대여료</th><td><input type="text" name="title"></td></tr>
					<tr><th>연령제한</th><td><input type="text" name="title"></td></tr>
					<tr><th>장르</th><td><input type="text" name="title"></td></tr>
					<tr><th>종류</th><td><input type="text" name="title"></td></tr>
				</table>
				
				
			</div>
			
		</div>
		
	<?php
		require_once($DOCUMENT_ROOT . "/template/footer.php");
	?>		
	</div>
</body>

  
</html>