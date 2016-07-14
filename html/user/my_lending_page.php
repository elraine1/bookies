<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
	<title>Hello, Bookies!</title>
	<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">

	<style type="text/css">
	table, tr, th, td{
		border: 1px dashed MidnightBlue;
		border-collapse: collapse;
	}
	th{
		background-color: blue;
	}
	div{
		text-align: center;
	}
	</style>
	
	<script>
	
	function select_all(){
		
		var returnList = document.getElementsByName('return_list[]');
		var checkSum = 0;		
		var check = true;
		
		var i = 0;
		for(i = 0; i < returnList.length; i++){
			checkSum += returnList[i].checked; 
		}
		
		if(checkSum == i){
			check = false;
		}
		
		for(i = 0; i < returnList.length; i++){
			returnList[i].checked = check; 
		}
	}
	
	
	</script>
	
</head>

<body>  
	<?php
		require_once ($_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php");
	?>
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
				
				<?php
					if(isset($_SESSION['login_status']) && ($_SESSION['login_status']==true)){
					
						$username = $_SESSION['username'];
						$lending_list = get_my_lending_list($username);
							
						printf("<div>");
						printf("<h3> 대여 현황(대여 정보) </h3><br>");
						printf("<b>%s </b>님께서 대여 중인 도서는 총 <b>%d</b> 권 입니다. <br><br>", $username, count($lending_list));
					
						printf("<form action='../book/return_process.php' method='POST'> ");
						printf("<table>");
						printf("<tr><th>번호</th><th>종류</th><th width='300'>도서명</th><th>대여일시</th><th>반납예정일</th><th>연체일</th><th>선택</th></tr>");
						
						for($i=0; $i<count($lending_list); $i++){
							printf("<tr>");
							printf("<td>%d</td>", $i+1);
							printf("<td>%s</td>", $lending_list[$i]['booktype']);
							printf("<td>%s</td>", $lending_list[$i]['title']);
							printf("<td>%s</td>", $lending_list[$i]['lend_date']);
							printf("<td>%s</td>", $lending_list[$i]['due_date']);
							printf("<td>%s</td>", $lending_list[$i]['delay']);
							printf("<td><input type='checkbox' name='return_list[]' value='%d'></td>", $lending_list[$i]['lending_id']);
							printf("</tr>");
						}
						printf("<tr><td colspan='7' align='center'><input type='button' value='전체 선택' onclick='select_all()'><input type='submit' value='선택도서 반납'></td></tr>");
						printf("</table><br><br>");
						printf("</form>");
					
						printf("<br>항상 이용해주셔서 감사합니다.<br>");
						printf("</div>");
						
					} else{
						
						printf("<b>로그인 후 이용하실 수 있습니다.</b><br>");
						printf("<a href='../index.php'>메인으로</a>");
					}
				
				?>
				
			</div>
			
		</div>
		
	<?php
		require_once($DOCUMENT_ROOT . "/template/footer.php");
	?>		
	</div>
</body>

  
</html>