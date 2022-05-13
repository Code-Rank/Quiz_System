<?php
include "../BLLs/AdminDashboard_BLL.php";
$objAdminDashboard_BLL=new AdminDashboard_BLL();
$objAdminDashboard_Entity=new AdminDashboard_Entity();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Dashboard</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/dashboard.css" rel="stylesheet">
	  <script language="javascript">
		function check(){
            if(document.form1.qst.value==""){
                alert("Please enter question");
                document.form1.qst.focus();
                return false;
            }
            if(document.form1.opt1.value==""){
                alert("Please enter 1st option");
                document.form1.opt1.focus();
                return false;
            } 
			if(document.form1.opt2.value==""){
                alert("Please enter 2nd option");
                document.form1.opt2.focus();
                return false;
            } 
            if(document.form1.opt3.value==""){
                alert("Please enter 3rd option");
                document.form1.opt3.focus();
                return false;
            }
            if(document.form1.opt4.value==""){
                alert("Please enter 4th option");
                document.form1.opt4.focus();
                return false;
            }
            if(document.form1.trueOpt.value  >= 4){
                alert("Please enter true option(between 0 to 3)");
                document.form1.trueOpt.focus();
				return false;
			}
            if(document.form1.cat.value==0){
                alert("Please select category");
                document.form1.cat.focus();
                return false;
            }
//            if(document.form1.gender.value==""){
//                alert("Plese select your gender");
//                document.form1.gender.focus();
//                return false;
//            }
//            if(document.form1.img.value==""){
//                alert("Plese upload an image");
//                document.form1.img.focus();
//                return false;
//            }
		}
  </script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Quiz System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../AdminLogout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a  href="AdminDashboard_View.php">Add Question</a></li>
            <li><a href="AddCategory_View.php">Add Category</a></li>
			<li><a href="DeleteQuestion_View.php">Delete Question</a></li>
            <li><a href="DeleteCategory_View.php">Delete Category</a></li>
			<li><a href="ShowRecord_View.php">Students Record</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Add Question</h1>

          <div class="table-responsive">
            <table class="table table-striped">
			
			
			
				  <form method="post" name="form1" action="AdminDashboard_View.php" onSubmit="return check();">
					<div class="form-group">
					  <label for="text">Question</label>
					  <input type="text" class="form-control" id="qst" name="qst"  placeholder="Enter question">
					</div>

					<div class="form-group">
					  <label for="text">Option 1</label>
					  <input type="text" class="form-control"  id="opt1" name="opt1"  placeholder="Enter option 1">
					</div>
					<div class="form-group">
					  <label for="text">Option 2</label>
					  <input type="text" class="form-control" id="opt2" name="opt2"  placeholder="Enter option 2">
					</div>
					
					<div class="form-group">
					  <label for="text">Option 3</label>
					  <input type="text" class="form-control"  id="opt3" name="opt3" placeholder="Enter option 3">
					</div>
					
					<div class="form-group">
					  <label for="text">Option 4</label>
					  <input type="text" class="form-control"  id="opt4" name="opt4" placeholder="Enter option 4">
					</div>
					<div class="form-group">
					  <label for="text">Answer</label>
					  <input type="number" class="form-control" id="trueOpt" name="trueOpt" placeholder="Enter option number (between 0 to 3)">
					</div>
						<div class="form-group">
								<?PHP
							   		$objAdminDashboard_BLL->getAllCategory(); 
							    ?>								
						</div>
					<button type="submit" name="submit" value="submit" class="btn btn-default">Add Question</button><br>
					  <?php
						if(isset($_POST['submit'])){
									if(isset($_POST['qst']) && isset($_POST['opt1']) && isset($_POST['opt2']) && isset($_POST['opt3']) && isset($_POST['opt4']) && isset($_POST['trueOpt'])){
										
        								$objAdminDashboard_Entity->setQuestion($_POST['qst']);
        								$objAdminDashboard_Entity->setOption1($_POST['opt1']);
        								$objAdminDashboard_Entity->setOption2($_POST['opt2']);
        								$objAdminDashboard_Entity->setOption3($_POST['opt3']);
        								$objAdminDashboard_Entity->setOption4($_POST['opt4']);
        								$objAdminDashboard_Entity->setTrueOption($_POST['trueOpt']);
        								$objAdminDashboard_Entity->setCategoryID($_POST['cat']);
        								
										$objAdminDashboard_BLL->insertQuestion($objAdminDashboard_Entity);
										echo '<br><div class="alert alert-success">
										<strong>Question Added Successfully! </strong>
  										</div>';
									}else{
										echo '<br><div class="alert alert-danger">
  													<strong>Question Not Added</strong>
											  </div>';
									}
								}
					  ?>
				  </form>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </body>
</html>
