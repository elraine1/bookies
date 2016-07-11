<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php";
	
	$count = 100;
	make_dummy($count);
	
?>
<script>
	alert('더미 생성 완료!');
	window.location = 'admin_index.php';

</script>