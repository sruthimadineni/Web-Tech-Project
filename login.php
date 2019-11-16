<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>User registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{

background-image:url("third_pic.jpg");
background-repeat:no-repeat;
background-position:center;
background-size:auto auto;
background-size:100%;
}


input[type=text], input[type=password] {
    width: auto;
    padding: 10px 10px;
    margin: 8px 8px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

<!--form{
margin:0 auto;
width:250px;
}
-->
form{
background:rgba(255,255,255,0.6);
padding:40px;
max-width:600px;
margin:40px auto;
border-radius:4px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: auto;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}
	


.imgcontainer {
	font:algerian;
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 10%;
    border-radius: 10%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
	h2
	{
		text-color:white;
	}
	
}
</style>

</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="login.php">
		<!--validation errors-->
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="Password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<p>
			Not a member yet? <a href="register1.php">Sign up</a>
		</p>
	</form>

</body>
</html>