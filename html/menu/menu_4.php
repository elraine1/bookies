<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">
	<style type="text/css">
		form {
			
			margin: 0 auto;
			
		}
		
		table, tr, th, td{
			border-collapse: collapse;
			text-align:center;
			height: 40px;
			width: 280px;
		}
		th{
			
			color : white;
		}
		th, td {
			
			
			color : white;
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
		
		<div class="wrap">
<h1>가입할 회원 정보를 입력하시오</h1>
<form action="register.php" method="post">
	<table align = "center">
		<tr><td>ID:</td><td><input class = "register_form" type="text" name="username"></td></tr>
		<tr><td>비번:</td><td><input class = "register_form" type="text" name="password"></td></tr>
		<tr><td>이름:</td><td><input class = "register_form" type="text" name="name"></td></tr>
		<tr><td>나이:</td><td><input class = "register_form" type="text" name="age"></td></tr>
		<tr><td>주소:</td><td><input class = "register_form" type="text" name="address"></td></tr>
		<tr><td>이메일:</td><td><input class = "register_form" type="text" name="email"></td></tr>
		<tr><td>연락처:</td><td><input class = "register_form" type="text" name="phone"></td></tr>
		<tr><td>성별:</td>
			<td>
				남성<input class = "register_form" type="radio" name="gender" value="male">
				여성<input class = "register_form" type="radio" name="gender" value="female"><br>
			</td>
		</tr>
		<tr><td></td><td><input class = "register_form" type="submit" value="가입하기"></td></tr>
		</form>
	</table>
	
	
	<?php
		require_once($DOCUMENT_ROOT . "/template/footer.php");
	?>	
	
	</div>
	
</body>

  
</html>