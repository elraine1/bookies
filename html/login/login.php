<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="/style/css/mystyle.css">
<html>
<body>
<?php
require_once 'session.php';
 
start_session();
 
if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    if (try_to_login($username, $password) == true) {
        header(sprintf("Location: %s", $_SESSION['request_uri']));
    } else {
		// 이멜주소 또는 비번이 등록되지 않았거나 틀림
        header('Location: error.php?error_code=1');
    }
} else {
	echo $_POST['username'] . "<br>" . $_POST['password'];
    echo '로그인 폼 에러';
}
?>
</body>
</html>