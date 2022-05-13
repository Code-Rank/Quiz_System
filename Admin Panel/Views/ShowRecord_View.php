<?php
include "../BLLs/ShowRecord_BLL.php";
$objShowRecord_BLL=new ShowRecord_BLL();
$objShowRecord_Entity=new ShowRecord_Entity();
$studentRecord=0;
$studentRecord=array();
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
            if(document.form1.email.value==0){
                alert("Plese Select Student Email");
                document.form1.email.focus();
                return false;
            } 
		}
  </script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../index.php">Quiz System</a>
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
            <li><a href="AdminDashboard_View.php">Add Question</a></li>
            <li><a href="AddCategory_View.php">Add Category</a></li>
			<li><a href="DeleteQuestion_View.php">Delete Question</a></li>
            <li><a href="DeleteCategory_View.php">Delete Category</a></li>
			<li class="active"><a href="ShowRecord_View.php">Students Record</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Show Record</h1>

          <div class="table-responsive">
            <table class="table table-striped">
				  <form method="post" name="form1" action="ShowRecord_View.php" onSubmit="return check();">
					 <?php
						$objShowRecord_BLL->getStudentEmail();
					  ?>
					<button type="submit" name="submit" value="submit" class="btn btn-default">Get Record</button><br>
					 <?PHP
					  if(isset($_POST['submit'])){
									if(isset($_POST['email'])){        								
										$studentRecord=$objShowRecord_BLL->getStudentResult($_POST['email']);
									}else{
										echo '<br><div class="alert alert-danger">
  													<strong>Category Not Added</strong>
											  </div>';
									}
								}
					  ?>
				  </form>
              </tbody>
            </table>
          </div>
		  <div>
		  <div class="col-sm-2"></div>
      <div class="col-sm-8">
		  <h2>Quiz Records</h2>
  		  <table class="table table-bordered">
		  <?PHP
		  	foreach($studentRecord as $objShowRecord){
		  ?>  
    <thead bgcolor="#A8B5CF">
      <tr>
        <th>Subject</th>
        <th><center><?php echo $objShowRecord->getQuizName(); ?></center></th>
      </tr>
    </thead>
    <tbody>
	  <tr>
        <td>Total Questions</td>
        <td><center><?php echo $objShowRecord->getTotalQuestion();?></center></td>
      </tr>
      <tr>
        <td>Attempted Qusetions</td>
        <td><center><?php echo $objShowRecord->getAttemptedQuestion();?></center></td>
      </tr>
      <tr>
        <td>Right Answers</td>
        <td><center><?php echo $objShowRecord->getRightAnswer();?></center></td>
      </tr>
      <tr>
        <td>Wrong Answers</td>
        <td><center><?php echo $objShowRecord->getWrongAnswer();?></center></td>
      </tr>
	  <tr>
        <td>Unattempted Qusetions</td>
        <td><center><?php echo $objShowRecord->getUnattemptedQuestion();?></center></td>
      </tr>
	  <tr>
        <td>Result Percentage</td>
        <td><center><?php echo $objShowRecord->getPercentage()."%"; ?></center></td>
      </tr>
    </tbody><?PHP } ?>
  </table>
		</div>
		  <div class="col-sm-2"></div>
    </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </body>
</html>
