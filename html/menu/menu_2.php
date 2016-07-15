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
			
			border-collapse: collapse;
			text-align:center;
		}
		th{
			background-color: #323232;
			color : white;
		}
		th, td {
			border-right: 3px solid #323232;
		}
		th:last-child, td:last-child {
			border-right: 0;
		}
		tr:last-child {
			border-bottom : 3px solid #323232;
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
				printf("<form action='../book/book_lending.php' method='post'>");
				printf("<h2> 신 간</h2><br>");
				printf("<table id='new_book'>");
				printf("<tr><th>번호</th><th width='400'> 제목</th><th>작가</th><th>출판사</th><th>언어</th>
						<th>대여료</th><th>연령제한</th><th>장르</th><th>책종류</th><th>입고일</th><th>대여 상태</th></tr>");
			
				for($i=0; $i<count($new_book); $i++){
					printf("<tr>");
					printf("<td>%d</td>", $i+1);
					printf("<td><a href='../book/book_detail.php?book_id=%d'>%s</td></td>", $new_book[$i]['book_id'], $new_book[$i]['title']);
					printf("<td>%s</td>", $new_book[$i]['author']);
				
					printf("<td>%s</td>", $new_book[$i]['publisher']);
					printf("<td>%s</td>", $new_book[$i]['lang']);
			
					printf("<td>%d</td>", $new_book[$i]['fee']);
					printf("<td>%s</td>", $new_book[$i]['age_limit']);
					printf("<td>%s</td>", $new_book[$i]['genre']);
					printf("<td>%s</td>", $new_book[$i]['booktype']);
				
					printf("<td>%s</td>", $new_book[$i]['update_date']);
					
					printf("<td>%s", $new_book[$i]['status']);
					if(isset($_SESSION['login_status']) && ($_SESSION['login_status'] == true) 
						&& ($_SESSION['admin_mode'] == false) && $new_book[$i]['status'] == "대여 가능"){
						printf("<input type='checkbox' name='lending[]' value='%d'>",$new_book[$i]['book_id']);
					}
					printf("</td>");
					printf("</tr>");
				}
				printf("</table>");
				
				if(isset($_SESSION['login_status']) && ($_SESSION['login_status'] == true) 
					&& $_SESSION['admin_mode'] == false){
					printf("<input id='lend_btn' type='submit' value='선택도서대여'>");
				}
				
				printf("</form>");
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