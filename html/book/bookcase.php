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
			text-align:center;
		}
		th{
			background-color: salmon;
		}
	
	</style>

</head>

<body>  
<?php 
	require_once $_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php";

	$booktype = $_GET['booktype'];
	$page = $_GET['page'];
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
					//// 페이징.
					$page_size = 30; 
					$page_start = ($page - 1) * $page_size;
					$page_end = $page * $page_size; 
					
					$total_post = get_total_book($booktype);
					$total_page = ($total_post - 1) / $page_size + 1;
					
					$block_size = 10;
					$curr_block = intval(($page - 1) / $block_size) + 1;
					$block_start = ($curr_block - 1) * $block_size + 1;
					$block_end = $block_start + $block_size;
					
					if($block_end > $total_page){
						$block_end = $total_page;
					}
						
					$bookcase = get_bookcase($booktype, $page_start, $page_end);
					
					printf("<table>");
					printf("<tr><th>번호</th><th>타입</th><th>장르</th><th width='500'>제목</th><th>연령제한</th><th>도서정가</th><th>대여료</th><th>출판사</th><th>대여상태</th></tr>");
					for($i=0; $i<count($bookcase); $i++){
						
						printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%s</td><td>%s</td></tr>", 
						$bookcase[$i]['book_id'], $bookcase[$i]['booktype'], $bookcase[$i]['genre'], $bookcase[$i]['title'], $bookcase[$i]['age_limit'], 
						$bookcase[$i]['price'], $bookcase[$i]['fee'], $bookcase[$i]['publisher'], $bookcase[$i]['status']);
					}
					printf("</table>");
					?>
					<form action="#" method='post'>
						<select name='category'>
							<option value='title' selected>제목</option>
							<option value='author'>작가</option>
							<option value='publisher'>출판사</option>
						</select>
						<input type='text' name='search_word'>
						<input type='submit' value='검색'>
					</form>
					<br>
					<?php

					
					// Block Paging
					// 이전 block, 다음 block 이 없는 경우 <a> 태그 사용 안 함. 
					if($block_start == 1){
						printf("[◀이전]");
					}else{
						printf("[<a href='./bookcase.php?booktype=%s&page=%d'>◀이전</a>]", $booktype, $block_start-1);
					}
					
					// Page Link (현재 page는 <a>태그 사용 안 함.)
					for($i = $block_start ; $i < $block_end ; $i++){
						if($i == $page){
							printf("[<b>%d</b>]", $i);
						}else {
							printf("[<a href='bookcase.php?booktype=%s&page=%d'>%d</a>]", $booktype, $i, $i);
						}
					
					}
					if($block_end == $total_page){
						printf("[다음▶]");
					}else{
						printf("[<a href='./bookcase.php?booktype=%s&page=%d'>다음▶</a>]", $booktype, $block_end);
					}
				




				
				?>
			</div>
			
		</div>
		
	<?php
		require_once($DOCUMENT_ROOT . "/template/footer.php");
	?>		
	</div>
</body>

  
</html>