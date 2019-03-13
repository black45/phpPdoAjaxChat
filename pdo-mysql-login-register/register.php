<?php
	require 'config.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FROM
		$username = $_POST['username'];
		$password = $_POST['password'];



		if($username == '')
			$errMsg = 'Enter username';
		if($password == '')
			$errMsg = 'Enter password';
		

		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO pdo (username, password) VALUES (:username, :password)');
				$stmt->execute(array(
					':username' => $username,
					':password' => $password,
					));
				header('Location: register.php?action=joined');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration successfull. Now you can <a href="login.php">login</a>';
	}
?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.5">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <title>Form</title>
</head>
<body style="padding: 5%;background-color: black;">
	<style>
.form-group{
 margin-bottom: 15px;
}
label{
 margin-bottom: 10px;
}

input,
input::-webkit-input-placeholder {
 font-size: 11px;
 padding-top: 3px;
}

.form-control {
	height: auto!important;
 padding: 9px 12px !important;
background: transparent;
}
#button {
 border: 1px solid #ccc;
 margin-top: 28px;
 padding: 6px 12px;
 transform: translateX(-0.3em);
 color: #666;
 text-shadow: 0 1px #fff;
 cursor: pointer;
 background: #f5f5f5;
 border-radius: none;
 background: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
 background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f5f5f5), color-stop(100%, #eeeeee));
 background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
 background: -o-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
 background: -ms-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
 background: linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#eeeeee', GradientType=0);
}
#button:hover{
  background: black;
  border: 1px solid black;
}

.main-form{
 margin-top: 30px;
 margin: 0 auto;
 max-width: 300px;
 padding: 10px 40px;
background:#009edf;
color: #FFF;
text-shadow: none;

background: transparent;

}
span.input-group-addon i {
	color: #009edf;
  font-size: 17px;
}
.login-button{
 margin-top: 5px;
}



#password{
	box-shadow: none;
	border-left: none;
	border-right: none;
	border-top: none;

	width: 210px;
}

#username{
	box-shadow: none;
	border-left: none;
	border-right: none;
	border-top: none;
	border-radius: 1px;
	width: 210px;
}

#buton{
	transform: translateX(4.1em);
	border-radius: 100%;
	width: 60px;
	height: 60px;
}



#sponge{
	transform: translateY(0.2em) translateX(1em);
	font-size: 20px;
	padding: 0px;
}

#fogot{
border: none;
 text-align: center;
transform: translateX(-0.7em) translateY(-1.2em);
}

body{

  background: url(https://images.unsplash.com/photo-1490838892548-5c0f4b648361?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80) no-repeat ;
  -moz-background-size: 100%; /* Firefox 3.6+ */
   -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
   -o-background-size: 100%; /* Opera 9.6+ */
   background-size: 100%; /* Современные браузеры */
   background-attachment: fixed;
   background-size: cover;
}
</style>
<body>


 <div class="container">
 <div class="row main-form">
 <form class="" method="post" action="#">

<button id="buton" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#form"><span class="glyphicon glyphicon-user" ></span></button>

<div class="form-group" class="cols-sm-10">
<label for="" class="cols-sm-2 control-label" id="sponge">Create Account</label>
</div>

		<form action="" method="post">
	
					<input class="form-control" type="text" id="username" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
					<input class="form-control" type="password"  id="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" class="box" /><br/>
					<input type="submit"  id="button" class="btn btn-primary btn-lg btn-block login-button" name='register' value="Register"  class='submit' formaction="login.php"/><br />
				</form>



 <div  class="modal-footer"  id="fogot" >
	 <a href="login.php"  class="btn btn-link" >Login</a>
 </div>

 </form>
 </div>
 </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">


function save(){
document.addEventListener("DOMContentLoaded", function() {
var ids = ["username", "password"];
for (var id of ids) {
var input = document.getElementById(id);
input.value = localStorage.getItem(id);
(function(id, input) {
input.addEventListener("change", function() {
  localStorage.setItem(id, input.value);
});
})(id, input);
}
});

  </script>
</body>
</html>
