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
				<form action="#" method="POST">
					<table>	
						<tr><th>제목</th><td><input type="text" name="title"></td></tr>
						<tr><th>ISBN</th><td><input type="text" name="isbn"></td></tr>
						<tr><th>작가</th><td><input type="text" name="author"></td></tr>
						<tr><th>발행년월</th><td><input type="text" name="published_date"></td></tr>
						<tr><th>출판사</th><td><input type="text" name="publisher"></td></tr>
						<tr><th>언어</th>		
							<td>	
								<select name='language'>
									<option value="kor" selected>한글</option>
									<option value="eng">영어</option>
								</select>
							</td>
						</tr>
						
						<tr><th>가격</th><td><input type="text" name="price" id="price" onblur="calc_fee();" ></td></tr>
						<tr><th>대여료</th><td><input type="text" name="lending_fee" id="fee" disabled></td></tr>
						<tr><th>연령제한</th><td><input type="text" name="age_limit"></td></tr>
						<tr><th>장르</th><td><input type="text" name="genre"></td></tr>
						<tr><th>종류</th>
							<td>	
								<select name='booktype'>
									<option value="comic" selected>만화</option>
									<option value="novel">소설</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="입력 완료" > <!-- onclick .. 입력 조건 확인. -->
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