<?php

require_once 'session.php';
require_once $_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php";
 
if (isset($_POST['username'], $_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password']; 
	$name = $_POST['name']; 
	$age = $_POST['age'];
	$address = $_POST['address']; 
	$email = $_POST['email']; 
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];

	$conn = get_mysql_conn();
	$stmt = mysqli_prepare($conn, "SELECT password_hash FROM member WHERE username = ?");
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if (mysqli_num_rows($result) != 0) { // 이미 등록된 아이디
		header('Location: error.php?error_code=4');
	} else { 
		$password_hash =  password_hash($password, PASSWORD_DEFAULT);
		$stmt = mysqli_prepare($conn, "INSERT INTO member(username,password_hash,name,age,address,email,phone,gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param($stmt, "ssssssss", $username,$password_hash,$name,$age,$address,$email,$phone,$gender);
		mysqli_stmt_execute($stmt);
		header('Location: ../index.php');
	}
	mysqli_free_result($result);
	mysqli_close($conn);
} else {
    echo '회원가입 폼 에러';
}
