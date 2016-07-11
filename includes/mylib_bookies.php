<?php
	function get_mysql_conn(){
		$hostname='kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
		$username='bookies';
		$password='bookies';
		$dbname='bookies';
		
		$conn=mysqli_connect($hostname, $username, $password, $dbname);
		mysqli_query($conn, "SET NAMES 'utf8'");
		if (!($conn)) {
			die('Mysql connection failed: '.mysqli_connect_error());
		} 
		return $conn;
	}
	
	
	function get_user_info($username){						
		$conn = get_mysql_conn();
		$stmt = mysqli_prepare($conn, "SELECT username,name,age,gender,address,email,phone FROM member WHERE username = ?");
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		
		$userinfo = array();
		$userinfo['username'] = $row["username"];
		$userinfo['name'] = $row["name"];
		$userinfo['age'] = $row["age"];
		$userinfo['gender'] = $row["gender"];
		$userinfo['address'] = $row["address"];
		$userinfo['email'] = $row["email"];
		$userinfo['phone'] = $row["phone"];
		
		mysqli_free_result($result);
		mysqli_close($conn);
		return $userinfo;
	}
	
	function get_member_list(){
		
		$member_list = array();
		
		$conn = get_mysql_conn();
		$stmt = mysqli_prepare($conn, "SELECT * FROM member ORDER BY grade_id");
		mysqli_stmt_execute($stmt);
		
		$i = 0;
		$result = mysqli_stmt_get_result($stmt);
		while($member = mysqli_fetch_assoc($result)){
			$member_list[$i]['mem_id'] = $member['mem_id'];
			$member_list[$i]['grade_id'] = $member['grade_id']; // 추후 등급명으로 변경.
			$member_list[$i]['username'] = $member['username'];
			$member_list[$i]['name'] = $member['name'];
			$member_list[$i]['age'] = $member['age'];
			$member_list[$i]['gender'] = $member['gender'];
			$member_list[$i]['phone'] = $member['phone'];
			$member_list[$i]['email'] = $member['email'];
			
			$i++;
		}
		
		mysqli_free_result($result);
		mysqli_close($conn);
		return $member_list;
	}
	
	function modify_userinfo($userinfo){
		
		$conn = get_mysql_conn();
		$update_query = sprintf("UPDATE member SET age=%d, gender='%s', address='%s', email='%s',phone = '%s' WHERE username ='%s'", 
				$userinfo['age'], $userinfo['gender'], $userinfo['address'], $userinfo['email'],$userinfo['phone'], $userinfo['username']);	
		
		if (mysqli_query($conn, $update_query) === false) {
			die(mysqli_error($conn));
		}
		echo "성공적으로 수정되었습니다. <br>";
		mysqli_close($conn);
	}
	
	function delete_user($username){
		$conn = get_mysql_conn();		
		$delete_query = sprintf("DELETE FROM member WHERE username='%s'", $username);
		
		if (mysqli_query($conn, $delete_query) === false) {
			die(mysqli_error($conn));
		}
		
		mysqli_close($conn);
	}

	function get_bookcase($booktype, $start, $end){

		$conn = get_mysql_conn();
		
		$stmt = mysqli_prepare($conn, "SELECT *
										FROM (  SELECT @ROWNUM := @ROWNUM + 1 AS ROWNUM, book.* 
												FROM (SELECT @ROWNUM := 0) as R, book	
												WHERE booktype = ? 
												ORDER BY book_id desc) as book
										WHERE ? < book.ROWNUM and book.ROWNUM < ?");
										
		mysqli_stmt_bind_param($stmt, "sss", $booktype, $start, $end);
		mysqli_stmt_execute($stmt);
		
		$i=0;
		$result = mysqli_stmt_get_result($stmt);
		while($book = mysqli_fetch_assoc($result)){
			
			$bookcase[$i]['book_id'] = $book['book_id'];
			$bookcase[$i]['title'] = $book['title'];
			$bookcase[$i]['genre'] = $book['genre'];
			$bookcase[$i]['age_limit'] = $book['age_limit'];
			$bookcase[$i]['price'] = $book['price'];
			$bookcase[$i]['fee'] = $book['fee'];
			$bookcase[$i]['booktype'] = $book['booktype'];
			$bookcase[$i]['publisher'] = $book['publisher'];
			
			if($book['status'] == true){
				$bookcase[$i]['status'] = "대여 가능";
			}else{
				$bookcase[$i]['status'] = "대여 불가";
			}
			
			$i++;
		}
		mysqli_free_result($result);
		mysqli_close($conn);
		return $bookcase;
	}
	
	function get_total_book($booktype){
		
		$conn = get_mysql_conn();
		$stmt = mysqli_prepare($conn, "SELECT count(*) as count FROM book WHERE booktype=?");
		mysqli_stmt_bind_param($stmt, "s", $booktype);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$tmp = mysqli_fetch_assoc($result);
		$count = $tmp['count'];
		
		mysqli_free_result($result);
		mysqli_close($conn);
		return $count;
	}
	
	
	
	
	
	
	
	function get_book_info($book_id){
		
		$conn = get_mysql_conn();
		$stmt = mysqli_prepare($conn, "SELECT * FROM book WHERE book_id = ?");
		mysqli_stmt_bind_param($stmt, "s", $book_id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		
		$book['book_id'] = $row['book_id'];
		$book['title'] = $row['title'];
		$book['isbn'] = $row['isbn'];
		$book['author'] = $row['author'];
		$book['published_date'] = $row['published_date'];
		$book['publisher'] = $row['publisher'];
		$book['lang'] = $row['lang'];
		$book['price'] = $row['price'];
		$book['fee'] = $row['fee'];
		$book['age_limit'] = $row['age_limit'];
		$book['genre'] = $row['genre'];
		$book['booktype'] = $row['booktype'];
		
		return $book;;
	}
	
	
	
	
	
	
	
	
	function make_dummy($count){
	
		$conn = get_mysql_conn();
	
		$booktype = array('만화','소설');
		$lang = array('eng','kor', 'jap');
		$age = array('전체이용가', '12세 미만 관람불가', '15세 미만 관람불가', '18세 미만 관람불가');
		$genre = array('SF','호러','순정','코믹','추리','로맨스','액션','학원','역사','아동','기타');
		$publisher = array('학산출판사', '대원씨아이', '서울문화사');
		
		for($i=0; $i<$count; $i++){
			
			$book['title'] = "도서" . $i;
			$book['isbn'] = 1000000000000 + rand(1,8999999999999);
			$book['author'] = "작가" . $i;
			$book['published_date'] = rand(1984, 2016) . "-" . rand(1,12) . "-" . rand(1,30);
			$book['publisher'] = $publisher[rand(0,2)];
			$book['lang'] = $lang[rand(0,2)];
			$book['price'] = rand(8,24) * 500;
			$book['fee'] = round($book['price']/1000)*100;
			$book['age_limit'] = $age[rand(0,2)];
			$book['genre'] = $genre[rand(0,10)];
			$book['booktype'] = $booktype[rand(0,1)];
			
			usleep(2000);
			
			$stmt = mysqli_prepare($conn, "INSERT INTO book(title,isbn,author,published_date,publisher,lang, price,fee,age_limit,genre,booktype) 
											VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			mysqli_stmt_bind_param($stmt, "sssssssssss", $book['title'],$book['isbn'],$book['author'],$book['published_date'],
					$book['publisher'],$book['lang'],$book['price'],$book['fee'],$book['age_limit'],$book['genre'],$book['booktype']);
			
			mysqli_stmt_execute($stmt);		
		}

		mysqli_close($conn);
	}
?>