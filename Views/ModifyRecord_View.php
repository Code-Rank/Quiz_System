  <!DOCTYPE html>
<?PHP 
include "../BLLs/ModifyRecord_BLL.php"; 
$objModifyRecord_BLL=new ModifyRecord_BLL();
$objModifyRecord_Entity=new ModifyRecord_Entity();
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
			if(document.form1.pass.value==""){
                alert("Plese enter your Password");
                document.form1.pass.focus();
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
				$objModifyRecord_Entity->setImage($img);
            }
        }
    }
}	
?>	

<body> 
<!--	<br><br>-->
	<div class="container">
		<div class="col-sm-2"></div>
			<div class="col-sm-8">
                <div class="panel panel-danger">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">Please enter your detail</div>
                </div>
			</div>
		<div class="col-sm-2"></div>
	</div>

	<div class="container">
		<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="panel panel-info">
								<div class="panel-heading">Modify Record Form</div>
							<div class="panel-body">
							  <form role="form" name="form1" method="post" action="ModifyRecord_View.php" enctype="multipart/form-data" onSubmit="return check();" >
								  <?PHP 
								if(isset($_POST['submit'])){	
									if(isset($_POST['Sname']) && isset($_POST['pass']) && isset($_POST['city']) && isset($_POST['address']) && isset($_POST['number']) && isset($_POST['gender'])){
										
        								$objModifyRecord_Entity->setName($_POST['Sname']);
        								$objModifyRecord_Entity->setEmail($_SESSION['email']);
        								$objModifyRecord_Entity->setPass($_POST['pass']);
        								$objModifyRecord_Entity->setCity($_POST['city']);
        								$objModifyRecord_Entity->setAddress($_POST['address']);
        								$objModifyRecord_Entity->setPhone($_POST['number']);
        								$objModifyRecord_Entity->setGender($_POST['gender']);
        								
        								$objModifyRecord_BLL->modifyStudentProfile($objModifyRecord_Entity);
										echo "<script> window.location.href = 'home_View.php'; </script>";
									}else{
										echo '<div class="alert alert-danger">
  													<strong>Profile Not Update</strong>
											  </div>';
									}
								}
								  
								$studentRecord=$objModifyRecord_BLL->getStudentByEmail($_SESSION['email']);
								foreach($studentRecord as $objModifyRecord){	
								?>
							  	<div class="form-group">
								  <label for="name">Name:</label>
								  <input type="text" class="form-control" name="Sname" id="Sname" value="<?PHP echo $objModifyRecord->getName() ?>" placeholder="Enter your name">
								</div>
								<div class="form-group">
								  <label for="pass">Password:</label>
								  <input type="password" class="form-control" name="pass" id="pass" value="<?PHP echo $objModifyRecord->getPass() ?>" placeholder="Enter your password">
								  <div class="form-group">
								  <label for="city">City:</label>
								  <input type="text" class="form-control" name="city" id="city" value="<?PHP echo $objModifyRecord->getCity() ?>" placeholder="Enter your city">
								</div>
								  <div class="form-group">
								  <label for="address">Address:</label>
								  <input type="text" class="form-control" name="address" id="address" value="<?PHP echo $objModifyRecord->getAddress() ?>" placeholder="Enter your address">
								</div>
								  <div class="form-group">
								  <label for="number">Phone Number:</label>
								  <input type="number" class="form-control" name="number" id="number" value="<?PHP echo $objModifyRecord->getPhone() ?>" placeholder="Enter your mobile number">
								</div>
								 <div class="form-group">
								  <label for="gender">Gender:</label>
								  <input type="text" class="form-control" name="gender" id="gender" value="<?PHP echo $objModifyRecord->getGender() ?>" placeholder="Enter your gender">
								</div>
								<div class="form-group">
								  <label for="img">Upload your image</label>
								  <input type="file" class="form-control" name="img" id="img" >
								  </div>
								<button type="submit" name="submit" value="submit" class="btn btn-default">Update</button>
							  </form>
								<?PHP }
								 ?>
						  </div>
						  </div>
			</div>
		
		
		<div class="col-sm-2"></div>
	  </div>
     </body>
</html>