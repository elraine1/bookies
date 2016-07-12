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
					
					$total_fee = 0;
					
					printf("<div id='lend_list'>");
					printf("<h3>선택 목록</h3>");
					printf("<table>");
					printf("<tr><th>번호</th><th width='400'>제목</th><th width='100'>fee</th></tr>");
					for($i=0; $i<count($lend_list); $i++){
						$total_fee += $lend_list[$i]['fee'];
						printf("<tr><td>%d</td><td>%s</td><td>%d원</td></tr>",  $i+1, $lend_list[$i]['title'], $lend_list[$i]['fee']);
					}
					printf("<tr><td colspan='3'>총 대여료는 %d원 입니다.</td></tr>", $total_fee);
					printf("<tr><td colspan='3' align='center'><button>결제</button><button>취소</button></td></tr>");
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


