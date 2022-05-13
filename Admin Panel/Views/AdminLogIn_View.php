  <!DOCTYPE html>

<html lang="en">
<head>
	<title>LogIn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>
		function check(){
            if(document.form1.email.value==""){
                alert("Plese enter your username");
                document.form1.email.focus();
                return false;
            } 
			if(document.form1.pass.value==""){
                alert("Plese enter your Password");
                document.form1.pass.focus();
                return false;
            }
		}
	</script>
</head>
	<?php include "../BLLs/AdminLogIn_BLL.php";?>
<body> 
	<br><br><br><br><br><br><br><br><br><br><br>
	<div class="container">
		<div class="col-sm-4"></div>
			<div class="col-sm-4">
                <div class="panel panel-danger">
                   <div class="panel-heading"><center><b>For Teachers only</b></center> </div>
                </div>
			</div>
		<div class="col-sm-4"></div>
	</div>

	<div class="container">
		<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-info">
					<div class="panel-heading">Login Form</div>
					<div class="panel-body">
						<form role="form" name="form1" action="AdminLogIn_View.php" method="post" onSubmit="return check();">	
							<div class="form-group">
								<label for="login">Username:</label>
								<input type="text" class="form-control" name="login" id="email" placeholder="Enter username">
							</div>
							<div class="form-group">
								<label for="pass">Password:</label>
								<input type="password" class="form-control" name="pass" id="pass" placeholder="Enter password">
							</div>
							<center><button type="submit" class="btn btn-default">Log In</button></center>
							
						</form>
<?php

	  $objAdminLogIn_BLL=new AdminLogIn_BLL();
	  $objAdminLogIn_Entity=new AdminLogIn_Entity();
	 if(isset($_POST["login"]) && isset($_POST["pass"])){
	  $objAdminLogIn_Entity->setLogin($_POST["login"]);
	  $objAdminLogIn_Entity->setPass($_POST["pass"]);
	  $objAdminLogIn_BLL->getAdminDetail($objAdminLogIn_Entity);
	 }
						?>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
	  </div>
     </body>
</html>