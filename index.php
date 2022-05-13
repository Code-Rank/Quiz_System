<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>
		function userPanel(){
			window.location.href="Views/LogIn_View.php";
		}
		function adminPanel(){
			window.location.href="Admin Panel/Views/AdminLogIn_View.php";
		}
	</script>
</head>
<body> 
	<br><br>

	<div class="container">
		<div class="col-sm-2"></div>
			<div class="col-sm-8">
                <div class="panel panel-danger">
                    <div class="panel-heading"><center><b>Quiz System</b></center></div>
                    <div class="panel-body"><center>Welcome to the <b>Quiz System</b></center></div>
                </div>
			</div>
		<div class="col-sm-2"></div>
	</div>

	<div class="container">
		<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<br><br><br><br><br><br><br><br>
				<div >

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="image" src="Img Button/Student.png" name="submit" width="115px" height="125px" alt="Student" onClick="userPanel()" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="image" src="Img Button/Teacher .png"images/teachers-icon-18112.png"" onClick="adminPanel()" name="submit" width="115px" height="125px" alt="Teacher"/>
					
				</div>
			</div>
			<div class="col-sm-4"></div>
		
	  </div>
	<div class="container">
		<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<br><br><br><br><br><br><br><br><br><br>
				<div class="panel panel-danger">
    		  		<div class="panel-heading">© copyright 2021<p style="float:right">Developed by Beginner Developer</p></div>
  				</div>
				<div class="col-sm-2"></div>
		</div>
	</div>
     </body>
</html>