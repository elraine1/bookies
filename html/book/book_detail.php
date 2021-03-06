<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
	<title>Hello, Bookies!</title>
	<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">
	<style type="text/css">
		table, td, tr, th{
			border: 1px dashed blue;
			border-collapse: collapse;
			margin-left: 50px;
		}
		th{
			background-color: LightSeaGreen;
		}
	</style>
</head>

<body>  
<?
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
				<h2> ◆ 도서 상세 ◆</h2><br>
				<?php
					$book_id = $_GET['book_id'];
					
					$book = get_book_info($book_id);
					
					printf("<table>");
					printf("<tr><th>번호</th><td>%d</td></tr>", $book['book_id']);
					printf("<tr><th>제목</th><td width='200'>%s</td></tr>", $book['title']);
					printf("<tr><th>장르</th><td>%s</td></tr>", $book['genre']);
					printf("<tr><th>연령 제한</th><td>%s</td></tr>", $book['age_limit']);
					printf("<tr><th>정가</th><td>%d원</td></tr>", $book['price']);
					printf("<tr><th>대여료</th><td>%d원</td></tr>", $book['fee']);
					printf("<tr><th>종류</th><td>%s</td></tr>", $book['booktype']);
					printf("<tr><th>출판사</th><td>%s</td></tr>", $book['publisher']);
					printf("<tr><th>출판일</th><td>%s</td></tr>", $book['published_date']);
					printf("<tr><th>대여상태</th><td>%s</td></tr>", $book['status']);
					
					// 관리자 계정으로 접속한 경우에만 도서 수정/삭제 가능.
					if(isset($_SESSION['admin_mode']) && ($_SESSION['admin_mode'] == true)){
						printf("<tr><td colspan='2' align='center'>");
						printf("<a href='book_modify.php?book_id=%d'><button>수정</button></a>",$book_id);
						printf("<a href='book_delete.php?book_id=%d'><button>삭제</button></a>",$book_id);
						printf("</td></tr>");
					}else if(isset($_SESSION['login_status']) && ($_SESSION['login_status'] == true)){
						
						if($book['status'] == "대여 가능"){
							printf("<tr><td colspan='2' align='center'><a href='lending_process.php?book_id=%d'><button>대여 신청</button></a></td></tr>", $book_id);
						}else{
							$lend_info = get_lend_date_info($book_id);
							
							printf("<tr><th>대여일시</th><td>%s</td></tr>", $lend_info['lend_date']);
							printf("<tr><th>반납예정일</th><td>%s</td></tr>", $lend_info['due_date']);
							printf("<tr><td colspan='2' align='center'><button disabled>대여 신청</button></td></tr>");
						}
						//printf("<a href='#'><button>취소</button></a>");
						printf("");
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
