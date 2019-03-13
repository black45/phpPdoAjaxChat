<?php
	require 'config.php';

	if(isset($_POST['login'])) {
		$errMsg = '';
	
		// Get data from FORM
		$username = $_POST['username'];
		$password = $_POST['password'];

		if($username == '')
			$errMsg = 'Enter username';
		if($password == '')
			$errMsg = 'Enter password';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT id, username, password FROM pdo WHERE username = :username');
				$stmt->execute(array(
					':username' => $username
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if($data == false){
					$errMsg = "User $username not found.";
				}
				else {
					if($password == $data['password']) {
						$_SESSION['username'] = $data['username'];
						$_SESSION['password'] = $data['password'];
						header('Location: mysimpleChat/index.php');
						exit;
					}
					else
						$errMsg = 'Password not match.';
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
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
	transform: translateX(-0.3em);
 border: 1px solid #ccc;
 margin-top: 28px;
 padding: 6px 12px;
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
	transform: translateY(0.2em) translateX(3.6em);
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
		<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}

			?>
				


 <div class="container">
 <div class="row main-form">
 <form class="" method="post" action="#">

<button id="buton" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#form"><span class="glyphicon glyphicon-user" ></span></button>

<div class="form-group" class="cols-sm-10">
<label for="" class="cols-sm-2 control-label" id="sponge">Login</label>
</div>


	<form action="" method="post">
					<input  type="text" class="form-control"  id="username" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" class="box" /><br/>
					<input type="submit" name='login' id="button" href="messageList.htm"  class="btn btn-primary btn-lg btn-block login-button" value="Login" class='submit'/><br />
	</form>




 <div  class="modal-footer"  id="fogot" >
	 <a href="register.php"  class="btn btn-link" >Create Account</a>
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

