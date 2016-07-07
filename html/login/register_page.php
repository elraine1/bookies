<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">
</head>
<body>
<div class="content">
<h1>가입할 회원 정보를 입력하시오</h1>
<form action="register.php" method="post">
	<table>
		<tr><td>ID:</td><td><input type="text" name="username"></td></tr>
		<tr><td>비번:</td><td><input type="text" name="password"></td></tr>
		<tr><td>이름:</td><td><input type="text" name="name"></td></tr>
		<tr><td>나이:</td><td><input type="text" name="age"></td></tr>
		<tr><td>주소:</td><td><input type="text" name="address"></td></tr>
		<tr><td>이메일:</td><td><input type="text" name="email"></td></tr>
		<tr><td>연락처:</td><td><input type="text" name="phone"></td></tr>
		<tr><td>성별:</td>
			<td>
				남성<input type="radio" name="gender" value="male">
				여성<input type="radio" name="gender" value="female"><br>
			</td>
		</tr>
	</table>
	<input type="submit" value="가입하기">
</form>
</div>
</body>
</html>