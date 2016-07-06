<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
	<title>Hello, World!</title>
  
</head>
<style type="text/css">

	.wrap{
		margin: 0 auto;
		padding: 0 auto;
		
	}

	#div_loginbar{
		height:35px;
		background-color: blue;
		padding-top:5px;
	}
	
	#header{
		height:105px;
		background-color: aqua;	
	}

	#footer{
		height:100px;
		background-color: aqua;	
	}
	
	.content_wrap{
		height: 800px;
		margin: 0px 0px 10px 0px;
	}
	
	#menu{
		height: 100%;
		width: 10%;
		float: left;
		background-color: green;
		margin: 5px 5px 5px 5px;
		margin-left: 5%;
	}
	
	#content{
		height: 100%;
		width: 70%;
		float:left;
		background-color: skyblue;
		margin: 5px 5px 5px 5px;
		margin-right: 5%;
		
	}
	
	h1{
		align-text: center;	
	}
	h4{
		align-text: center;
	}
	
	#h1_header{
		display: inline-block;
	}
	#h4_header{
		display: inline-block;
	}
	
	li{
		height:50px;
	}
	
	a, a:link{
		text-decoration: none;
		color:black;
	}
	
</style>
<body>  

	<div class="wrap">

		<div id="div_loginbar">
			<b>Login Bar</b>
			ID:<input type="text" id="username"> PW:<input type="password" id="password"> <button>로그인</button>
			<button>회원가입</button>
		</div>
		
		<div id="header">
			<hr>
			<a href="index.php"><h1 id="h1_header">Welcome to StuRec!</h1></a>
			<h4 id="h4_header">(header)</h4>
			<hr>
		</div>
		
		<div class="content_wrap">		
			
			<div id="menu">
				<ul>
					<li><a href="#"><h3>메뉴1</h3></a></li>
					<li><a href="#"><h3>메뉴2</h3></a></li>
					<li><a href="#"><h3>메뉴3</h3></a></li>
					<li><a href="#"><h3>메뉴4</h3></a></li>
				</ul>
			</div>
			
			<div id="content">
				<h1> 내용 </h1>
			</div>
			
		</div>
		
		<div id="footer">
			<h3>Footer</h3>
		</div>
	</div>
</body>

  

</html>