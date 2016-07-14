<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
	<title>Hello, Bookies!</title>
	<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">
	<style type="text/css">
		table, td, th, tr{
			border: 1px dashed salmon;
			border-collapse: collapse;
			text-align:center;
		}
		th{
			background-color:lightsalmon;
		}
		#lend_list{
			text-align:left;
			margin-left: 50px;
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
					require_once $_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php";

					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						$lending = $_POST['lending'];
					}

					$lend_list = array();	
					for($i=0; $i < count($lending); $i++){
						$book  = get_book_info($lending[$i]);
						$lend_list[] = $book;
					}
					
					printf("<div id='lend_list'>");
					printf("<h3>선택 목록</h3>");
					printf("<form action='lending_process.php' method='POST'>");
					$total_fee = 0;
					
					printf("<table>");
					printf("<tr><th>번호</th><th width='400'>제목</th><th width='100'>대여료</th></tr>");
					for($i=0; $i<count($lend_list); $i++){
						$total_fee += $lend_list[$i]['fee'];
						printf("<input type='hidden' name='lending[]' value='%s'", $lend_list[$i]['book_id']);
						printf("<tr>");
						printf("<td>%d</td>", $i+1);
						printf("<td><a href='book_detail.php?book_id=%d'>%s</a></td>", $lend_list[$i]['book_id'], $lend_list[$i]['title']);
						printf("<td>%d원</td>", $lend_list[$i]['fee']);
						printf("</tr>");
					}
					printf("<tr><td colspan='3'>총 대여료는 %d원 입니다.</td></tr>", $total_fee);
					printf("<tr><td colspan='3' align='center'>");
					printf("<input type='submit' value='결제'>");
					printf("<input type='reset' value='취소'>");
					printf("</td></tr>");
					printf("</table>");
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


