		
<div id="menu">
	<ul>
		<li><a href="../menu/menu_1.php"><h4>베스트</h4></a></li>
		<li><a href="../menu/menu_2.php"><h4>신간</h4></a></li>
		<li><a href="../menu/menu_3.php"><h4>만화</h4></a></li>
		<li><a href="../menu/menu_4.php"><h4>소설</h4></a></li>
		<?php
			if(isset($_SESSION['admin_mode']) && ($_SESSION['admin_mode'] == true)){
				printf("<li><a href='../admin/admin_index.php'><h4>관리페이지</h4></a></li>");
			}
		?>
	</ul>
</div>