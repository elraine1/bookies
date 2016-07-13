<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
	<title>Hello, Bookies!</title>
	<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">

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
				<h2> 메뉴 5(관리자페이지)</h2><br>
				여기다 뭐 넣을까.<br>
			
				<ul>
					<li><a href="book_register_page.php">도서 등록</a></li>
					<li><a href="lending_table.php">대여 현황</a></li><!-- ~~책이 ~~~에게 ~~일 빌려감. ~~일 반납 예정 -->
					<li><a href="member_list.php">회원 정보 보기</a><li>
				</ul>
				
				<h5>더미 생성 버튼</h5>
				<a href="#"><button>계정</button></a>
				<a href="make_dummy.php"><button>도서</button></a>
				<?php 
					date_default_timezone_set('Asia/Seoul');
					echo date("Y-m-d h:m:s", strtotime(sprintf("+%d day", 3)));
//					echo (date("Y-m-d") + strtotime(sprintf("+%d day", 3)));
				?>
			</div>
			
		</div>
		
	<?php
		require_once($DOCUMENT_ROOT . "/template/footer.php");
	?>		
	</div>
</body>

  
</html>