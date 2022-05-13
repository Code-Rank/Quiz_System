<?php
include "../BLLs/DeleteCategory_BLL.php";
$objDeleteCategory_BLL=new DeleteCategory_BLL();
$objDeleteCategory_Entity=new DeleteCategory_Entity();
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
            if(document.form1.cat.value==0){
                alert("Plese select category to delete");
                document.form1.cat.focus();
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
            <li><a  href="AdminDashboard_View.php">Add Question</a></li>
            <li><a href="AddCategory_View.php">Add Category</a></li>
            <li><a href="DeleteQuestion_View.php">Delete Question</a></li>
            <li class="active" ><a href="DeleteCategory_View.php">Delete Category</a></li>
			<li><a href="ShowRecord_View.php">Students Record</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Delete Category</h1>

          <div class="table-responsive">
            <table class="table table-striped">
			
			
			
				<form method="post" name="form1" action="DeleteCategory_View.php" onSubmit="return check();">
					<div class="form-group">
						<?PHP
							$objDeleteCategory_BLL->getAllCategory(); 
						?>								
					</div>
				<button type="submit" name="submit" value="submit" class="btn btn-default">Delete Category</button><br>
					  <?php
						if(isset($_POST['submit'])){
							if(isset($_POST['cat'])){			
								$objDeleteCategory_Entity->setCategoryID($_POST['cat']);		
								$objDeleteCategory_BLL->deleteCategory($objDeleteCategory_Entity);
										echo '<br><div class="alert alert-success">
										<strong>Category Deleted Successfully! </strong>
  										</div>';
									}else{
										echo '<br><div class="alert alert-danger">
  													<strong>Category Not Deleted!</strong>
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
