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
			text-align:center;
		}
	</style>
		
	<script>
		function calc_fee(){
			var price = document.getElementById('price').	value;
			var fee = Math.round(price/1000)*100;
			document.getElementById('fee').value = fee;
		}
		
		/// 미입력 칸에 대한 스크립트 작성할 것.
		// register 에서 처리 하지 않도록.
		
	</script>
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
				<form action="book_register.php" method="POST">
					<table>	
						<tr><th>제목</th><td><input type="text" name="title"></td></tr>
						<tr><th>ISBN</th><td><input type="text" name="isbn"></td></tr>
						<tr><th>작가</th><td><input type="text" name="author"></td></tr>
						<tr><th>발행년월</th><td><input type="text" name="published_date"></td></tr>
						<tr><th>출판사</th><td><input type="text" name="publisher"></td></tr>
						<tr><th>언어</th>		
							<td>	
								<select name='lang'>
									<option value="kor" selected>한글</option>
									<option value="eng">영어</option>
									<option value="jap">일본어</option>
								</select>
							</td>
						</tr>
						
						<tr><th>가격</th><td><input type="text" name="price" id="price" onblur="calc_fee();" ></td></tr>
						<tr><th>대여료</th><td><input type="text" name="lending_fee" id="fee" readonly></td></tr>
						<tr><th>연령제한</th>
							<td>	
								<select name='age_limit'>
									<option value="0" selected>전체연령가</option>
									<option value="12">12세 미만 관람불가</option>
									<option value="15">15세 미만 관람불가</option>
									<option value="18">18세 미만 관람불가</option>
								</select>
							</td>
						<tr><th>장르</th>
							<td>	
								<select name='genre'>
									<option value="1" selected>SF</option>
									<option value="2">호러</option>
									<option value="3">순정</option>
									<option value="4">코믹</option>
									<option value="5">추리</option>
									<option value="6">로맨스</option>
									<option value="7">액션</option>
									<option value="8">학원</option>
									<option value="9">역사</option>
									<option value="10">아동</option>
									<option value="11">기타</option>
								</select>
							</td>
						</tr>
						<tr><th>종류</th>
							<td>	
								<select name='booktype'>
									<option value="1" selected>만화</option>
									<option value="2">소설</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="입력 완료" > <!-- onclick .. 입력 조건 확인.-->
							<input type="reset" value="취소"></td>
						</tr>
					</table>
					
				</form>
				
				
			</div>
			
		</div>
		
	<?php
		require_once($DOCUMENT_ROOT . "/template/footer.php");
	?>		
	</div>
</body>

  
</html>