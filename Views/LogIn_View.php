  <!DOCTYPE html>

<html lang="en">
<head>
	<title>LogIn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
</head>
	<?php include "../BLLs/LogIn_BLL.php";?>
<body> 
	<br><br>
	<div class="container">
		<div class="col-sm-2"></div>
			<div class="col-sm-8">
                <div class="panel panel-danger">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">Please enter your email address and password </div>
                </div>
			</div>
		<div class="col-sm-2"></div>
	</div>

	<div class="container">
		<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="panel panel-info">
					<div class="panel-heading">Login Form</div>
					<div class="panel-body">
						<form role="form" action="LogIn_View.php" method="post">	
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" name="login" id="email" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" name="pass" id="pwd" placeholder="Enter password">
							</div>
							<button type="submit" class="btn btn-default">Log In</button>
							<a style="float:right" class="btn btn-success" href="SignUp_View.php" >New User?Click Here</a>
						</form>
<?php

	  $objLogIn_BLL=new LogIn_BLL();
	  $objLogIn_Entity=new LogIn_Entity();
	 if(isset($_POST["login"]) && isset($_POST["pass"])){
	  $objLogIn_Entity->setLogin($_POST["login"]);
	  $objLogIn_Entity->setPass($_POST["pass"]);
	  $objLogIn_BLL->getUserDetail($objLogIn_Entity);
	 }
						?>
					</div>
				</div>
			</div>
			<div class="col-sm-2"></div>
	  </div>
     </body>
</html>