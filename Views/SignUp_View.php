  <!DOCTYPE html>
<?PHP 
include "../BLLs/SignUp_BLL.php"; 
$objSignUp_BLL=new SignUp_BLL();
$objSignUp_Entity=new SignUp_Entity();
?>
<html lang="en">
<head>
	<title>Sign Up</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script language="javascript">
		function check(){
            if(document.form1.Sname.value==""){
                alert("Plese enter your name");
                document.form1.Sname.focus();
                return false;
            }
            if(document.form1.email.value==""){
                alert("Plese enter your Email");
                document.form1.email.focus();
                return false;
            } 
			if(document.form1.pass.value==""){
                alert("Plese enter your Password");
                document.form1.pass.focus();
                return false;
            } 
            if(document.form1.cpass.value==""){
                alert("Plese enter Confirm Password");
                document.form1.cpass.focus();
                return false;
            }
            if(document.form1.pass.value!=document.form1.cpass.value){
                alert("Confirm Password does not matched");
                document.form1.cpass.focus();
                return false;
            }
            if(document.form1.city.value==""){
                alert("Plese enter Your city name");
                document.form1.city.focus();
                return false;
            }
            if(document.form1.address.value==""){
                alert("Plese enter your Address");
                document.form1.address.focus();
               return false;
            }
            if(document.form1.number.value==""){
                alert("Plese enter your Contact No");
                document.form1.number.focus();
                return false;
            }
            if(document.form1.gender.value==""){
                alert("Plese select your gender");
                document.form1.gender.focus();
                return false;
            }
            if(document.form1.img.value==""){
                alert("Plese upload an image");
                document.form1.img.focus();
                return false;
            }
		}
  </script>
</head>
<?php
if(isset($_POST['submit'])){
    $img=$_FILES['img']['name'];
    $tempName=$_FILES['img']['tmp_name'];

    if(isset($img)){
        if(!empty($img)){
            $location = "../images/";
            if(move_uploaded_file($tempName, $location.$img)){
				$objSignUp_Entity->setImage($img);
            }
        }
    }
}	
?>	

<body> 
	<br><br>
	<div class="container">
		<div class="col-sm-2"></div>
			<div class="col-sm-8">
                <div class="panel panel-danger">
                    <div class="panel-heading">Sign Up</div>
                    <div class="panel-body">Please enter your detail</div>
                </div>
			</div>
		<div class="col-sm-2"></div>
	</div>

	<div class="container">
		<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="panel panel-info">
								<div class="panel-heading">Signup Form</div>
							<div class="panel-body">
							  <form role="form" name="form1" method="post" action="SignUp_View.php" enctype="multipart/form-data" onSubmit="return check();" >
								  <?PHP
								
								if(isset($_POST['submit'])){
									$count=$objSignUp_BLL->checkEmailExistance($_POST['email']);
									if($count != 1){
                                        if(isset($_POST['Sname']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['city']) && isset($_POST['address']) && isset($_POST['number']) && isset($_POST['gender'])){

                                            $objSignUp_Entity->setName($_POST['Sname']);
                                            $objSignUp_Entity->setEmail($_POST['email']);
                                            $objSignUp_Entity->setPass($_POST['pass']);
                                            $objSignUp_Entity->setCity($_POST['city']);
                                            $objSignUp_Entity->setAddress($_POST['address']);
                                            $objSignUp_Entity->setPhone($_POST['number']);
                                            $objSignUp_Entity->setGender($_POST['gender']);

                                            $objSignUp_BLL->insertStudentData($objSignUp_Entity);


                                            echo '<div class="alert alert-success">
                                            <strong>Registered Successfully! </strong>&nbsp;<a href="LogIn_View.php" class="alert-link">Click me</a> to go on Login Page.
                                            </div>';
                                        }else{
										echo '<div class="alert alert-danger">
  													<strong>Not Registered</strong>
											  </div>';
									}
									}else{
										echo '<div class="alert alert-danger">
  													<strong>Email Already Exist</strong>
											  </div>';
									}
								}
								  ?>
							  	<div class="form-group">
								  <label for="name">Name:</label>
								  <input type="text" class="form-control" name="Sname" id="Sname" placeholder="Enter your name">
								</div>
								<div class="form-group">
								  <label for="email">Email:</label>
								  <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
								</div>
								<div class="form-group">
								  <label for="pass">Password:</label>
								  <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter your password">
								</div>
								  <div class="form-group">
								  <label for="cpass">Confirm Password:</label>
								  <input type="password" class="form-control" id="cpass" placeholder="Enter your password">
								</div>
								  <div class="form-group">
								  <label for="city">City:</label>
								  <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city">
								</div>
								  <div class="form-group">
								  <label for="address">Address:</label>
								  <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address">
								</div>
								  <div class="form-group">
								  <label for="number">Phone Number:</label>
								  <input type="number" class="form-control" name="number" id="number" placeholder="Enter your mobile number">
								</div>
								 <div >
								  <label for="gender"><b>Gender:</b></label>
								  <div class="radio" >
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" class="radio" value="Male" id="gender" name="gender" >Male</label>
								  &nbsp;&nbsp;&nbsp;<label><input type="radio" class="radio" value="Female" id="gender" name="gender" >Female</label></div>
								</div>
								<div class="form-group">
								  <label for="img">Upload your image</label>
								  <input type="file" class="form-control" name="img" id="img" >
								  </div>
								<button type="submit" name="submit" value="submit" class="btn btn-default">Sign UP</button>&nbsp;&nbsp;&nbsp;&nbsp;
								  <a style="float:right" class="btn btn-success" href="LogIn_View.php" >Already have an Account?Click Here</a>
							  </form>
								
						  </div>
						  </div>
			</div>

		<div class="col-sm-2"></div>
	  </div>
     </body>
</html>