<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>

<style type="text/css">

.wrap{margin:0 auto;width:50%;margin-top:50px;text-align: center;}
table{width:90%;border:1px solid #9BFA73;border-collapse:collapse;}
th{background:#9BFA73;}
.num{width:10%;}
td{border:1px solid #9EF048;padding:10px;text-align:center;}
th{border:0px solid #9EF048;padding:10px;}



</style>
<body>

<div class="wrap">

<table>
<h1>만화</h1>
<tr>

<th>제목</th>
<th>글쓴이</th>

</tr>







<?php

	$hostname = '';
	$username = '';
	$password = '';
	$dbname = '';
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	} 	
	

	$select_query = 'SELECT FROM bookies';
	// select 쿼리는 mysqli_query 함수의 반환값으로 결과를 받는다.
	$result = mysqli_query($conn, $select_query);
	
	while($row = mysqli_fetch_assoc($result)) {

		if($row['board_id'] == 2){
			echo "<tr>";
			echo "<td>".$row['']."</td>";
			printf ("<td><a href=\".php?number=%d\">%s</a></td>", $row[''], $row['']);
			echo "<td>".$row['r']."</td>";
			echo "<td>".$row['']."</td>";
			echo "</tr>";
		
		}
	}
	mysqli_free_result($result);
	mysqli_close($conn);
	echo "</table>";
	echo "<br>";
	echo '<a href=.php?board_id=2></a>';
	echo '<br>'.'<br>';
?>

	
	<form action="1.php" method="post">
				
		<input type="submit" value="메인으로">
	</form>
	
</td>
</body>
</html>