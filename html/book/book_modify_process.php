<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 	
	$mylib_path = $_SERVER['DOCUMENT_ROOT'] . '../../includes/mylib_bookies.php';
	require_once($mylib_path);
		
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$book['book_id'] = $_POST['book_id'];
		$book['title'] = $_POST['title'];
		$book['genre'] = $_POST['genre'];
		$book['age_limit'] = $_POST['age_limit'];
		$book['price'] = $_POST['price'];
		$book['fee'] = $_POST['fee'];
		$book['booktype'] = $_POST['booktype'];
		$book['publisher'] = $_POST['publisher'];
		$book['published_date'] = $_POST['published_date'];
		

		if( $book['title'] == ''|| $book['genre'] == ''|| $book['age_limit'] == ''|| $book['price'] == ''|| $book['fee'] == ''|| $book['booktype'] == ''|| $book['publisher'] == ''|| $book['published_date'] == ''){
			die('빈칸을 모두 채워주세요.');
		}
		modify_book($book);
	}
	header('Location: book_detail.php?book_id='.$book['book_id']);
	
?>