<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">
<body>
<h1>정보 수정 양식!</h1>
<h3>내 정보를 수정해졍!!</h3>

<?php
require_once ($_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php");
require_once '../login/session.php';
 
start_session();
$username = $_SESSION['username'];

$conn = get_mysql_conn();
	$stmt = mysqli_prepare($conn, "SELECT username,name,age,gender,address,email,phone FROM member WHERE username = ?");
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_assoc($result);
	$username = $row["username"];
	$name = $row["name"];
	$age = $row["age"];
	$gender = $row["gender"];
	$address = $row["address"];
	$email = $row["email"];
	$phone = $row["phone"];
	
	 printf ("<form action='#' method='post'>");
	 printf ("<table>");
	 printf ("<tr><th><b>아이디 :</b></th><td>%s</td></tr>",$username);
	 printf ("<tr><th><b>이름 :</b></th><td>%s</td></tr>",$name);
	 printf ("<tr><th><b>나이 :</b></th><td><input type='text' value='%d'></td></tr>",$age);
	 printf ("<tr><th><b>성별 :</b></th><td><input type='text' value='%s'></td></tr>",$gender);
	 printf ("<tr><th><b>주소 :</b></th><td><input type='text' value='%s'></td>",$address);
	 printf ("<tr><th><b>이메일 :</b></th><td><input type='text' value='%s'></td></tr>",$email);
	 printf ("<tr><th><b>연락처 :</b></th><td><input type='text' value='%s'></td></tr>",$phone);
	 printf ("</table>");
	printf ("</form>");
?>

<a href="#"><button>이대로 바꿔졍!</button></a>
<a href="/index.php"><button>집으로 가자!!</button></a>