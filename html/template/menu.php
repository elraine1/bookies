		
<div id="menu">
	<ul>
		<li><a href="../menu/menu_1.php"><h4>베스트</h4></a></li>
		<li><a href="../menu/menu_2.php"><h4>신간</h4></a></li>
		<li><a href="../book/bookcase.php?booktype=만화&page=1"><h4>만화</h4></a></li>
		<li><a href="../book/bookcase.php?booktype=소설&page=1"><h4>소설</h4></a></li>
		<?php
			if(isset($_SESSION['admin_mode']) && ($_SESSION['admin_mode'] == true)){
				printf("<li><a href='../admin/admin_index.php'><h4>관리페이지</h4></a></li>");
			}else if(isset($_SESSION['login_status']) && ($_SESSION['login_status'] == true)){
				printf("<li><a href='#'><h4>대여 현황</h4></a></li>");
			}
		?>
	</ul>
</div>