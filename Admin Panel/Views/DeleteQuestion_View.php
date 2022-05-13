<?php
include "../BLLs/DeleteQuestion_BLL.php";
$objDeleteQuestion_BLL=new DeleteQuestion_BLL();
$objDeleteQuestion_Entity=new DeleteQuestion_Entity();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Dashboard</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/dashboard.css" rel="stylesheet">
	  <script>
	  function check(){
            // if(document.form1.cat.value==0){
            //     alert("Plese select category");
            //     document.form1.cat.focus();
            //     return false;
            // }
            if(document.form1.qst.value==0){
                alert("Plese select question");
                document.form1.qst.focus();
                return false;
            } 
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
            <li ><a  href="AdminDashboard_View.php">Add Question</a></li>
            <li><a href="AddCategory_View.php">Add Category</a></li>
            <li class="active"><a href="DeleteQuestion_View.php">Delete Question</a></li>
            <li><a href="DeleteCategory_View.php">Delete Category</a></li>
			<li><a href="ShowRecord_View.php">Students Record</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Delete Question</h1>

          <div class="table-responsive">
            <table class="table table-striped">
				
			
				<form method="post" name="form1" action="DeleteQuestion_View.php" onSubmit="return check();">
					
					<div class="form-group">
						
						<?PHP
							$objDeleteQuestion_BLL->getAllCategory(); 
						echo '<button type="submit" name="submit1" value="submit1" class="btn btn-default">Get Question</button><br>';
						if(isset($_POST['submit1'])){
							if(isset($_POST['cat'])){
								$catID=$_POST['cat'];
								$objDeleteQuestion_BLL->getQuestionForDeletion($catID);								
							}
							echo '<button type="submit" name="submit2" value="submit2" class="btn btn-default">Delete Category</button><br>';
						}
							
							if(isset($_POST['submit2'])){
							if(isset($_POST['qst'])){
										$objDeleteQuestion_Entity->setQuestionID($_POST['qst']);
										$objDeleteQuestion_BLL->deleteQuestion($objDeleteQuestion_Entity);
								
										echo '<br><div class="alert alert-success">
										<strong>Question Deleted Successfully! </strong>
  										</div>';
									}else{
										echo '<br><div class="alert alert-danger">
  													<strong>Question Not Question! </strong>
											  </div>';
									}
								}
						
						?>								
					</div>
				
		   </div>
				  </form>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </body>
</html>
