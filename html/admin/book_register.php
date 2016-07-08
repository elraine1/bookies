<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php";
 
if (isset($_POST['title'], $_POST['isbn'], $_POST['author'], $_POST['published_date'],
 $_POST['publisher'], $_POST['lang'], $_POST['price'], $_POST['lending_fee'],
 $_POST['age_limit'], $_POST['genre'], $_POST['booktype'])) {
	 
	$book['title'] = $_POST['title'];
	$book['isbn'] = $_POST['isbn']; 
	$book['author'] = $_POST['author']; 
	$book['published_date'] = $_POST['published_date'];
	$book['publisher'] = $_POST['publisher']; 
	$book['lang'] = $_POST['lang']; 
	$book['price'] = $_POST['price'];
	$book['lending_fee'] = $_POST['lending_fee'];
	$book['age_limit'] = $_POST['age_limit'];
	$book['genre'] = $_POST['genre'];
	$book['booktype'] = $_POST['booktype'];
	
	$conn = get_mysql_conn();
	$stmt = mysqli_prepare($conn, "INSERT INTO book(title,isbn,author,published_date,publisher,lang, price,lending_fee,age_limit,genre,booktype) 
										VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	mysqli_stmt_bind_param($stmt, "sssssssssss", $book['title'],$book['isbn'],$book['author'],$book['published_date'],
	$book['publisher'],$book['lang'],$book['price'],$book['lending_fee'],$book['age_limit'],$book['genre'],$book['booktype']);
	mysqli_stmt_execute($stmt);
	mysqli_close($conn);
	
	header('Location: ../index.php');

} else {
    echo '도서등록 폼 에러';
}
