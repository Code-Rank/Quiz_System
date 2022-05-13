<?php
include "../BLLs/Home_BLL.php";
$email=$_SESSION['email'];
$quizID=$_SESSION['cat']=0;
$objHome_BLL=new Home_BLL();
$objHome_Entity=new Home_Entity();
$objHome_Entity->setEmailID($email);
$studentRecord=$objHome_BLL->getStudentResult($email);
?>

	<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Quiz System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script>
		function check(){
            if(document.form1.cat.value==0){
                alert("Plese select your Quiz");
                document.form1.cat.focus();
                return false;
            }
		}
	</script>
</head>
<body>

<div class="container">
  <h2>Quiz System</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#profile">Profile</a></li>
    <li><a data-toggle="tab" href="#result">Result</a></li>
    <li style="float:right"><a href="../Logout.php">Logout</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
		<br><br><br><br><br>
		<center><button type="button" class="btn btn-primary" data-toggle="pill" href="#quiz" >Start Quiz</button></center>
		<div class="col-sm-4"></div>
	   <div class="col-sm-4"><br>
	   <div id="quiz" class="tab-pane fade">

		  <form name="form1"  method="post" action="ShowTest_View.php" onSubmit ="return check();" >
			  <?PHP
				$objHome_BLL->getAllCategory(); 
			  ?>
		  <center><input type="submit" value="submit" class="btn btn-primary" /></center>
		</form>
	  </div>
	  </div>
	  <div class="col-sm-4"></div>
    </div>
    <div id="profile" class="tab-pane fade">
		<h3>PROFILE</h3>
		<?PHP
			$objHome_BLL->getUserEmail($objHome_Entity);
		?>
		
    </div>
    
	  <div id="result" class="tab-pane fade">
		  <div class="col-sm-2"></div>
      <div class="col-sm-8">
		  <h2>Quiz Records</h2>
  		  <table class="table table-bordered">
		  <?PHP
		  	foreach($studentRecord as $objHome){
		  ?>  
    <thead bgcolor="#A8B5CF">
      <tr>
        <th>Subject</th>
        <th><center><?php echo $objHome->getQuizName(); ?></center></th>
      </tr>
    </thead>
    <tbody>
	  <tr>
        <td>Total Questions</td>
        <td><center><?php echo $objHome->getTotalQuestion();?></center></td>
      </tr>
      <tr>
        <td>Attempted Qusetions</td>
        <td><center><?php echo $objHome->getAttemptedQuestion();?></center></td>
      </tr>
      <tr>
        <td>Right Answers</td>
        <td><center><?php echo $objHome->getRightAnswer();?></center></td>
      </tr>
      <tr>
        <td>Wrong Answers</td>
        <td><center><?php echo $objHome->getWrongAnswer();?></center></td>
      </tr>
	  <tr>
        <td>Unattempted Qusetions</td>
        <td><center><?php echo $objHome->getUnattemptedQuestion();?></center></td>
      </tr>
	  <tr>
        <td>Result Percentage</td>
        <td><center><?php echo $objHome->getPercentage()."%"; ?></center></td>
      </tr>
    </tbody><?PHP } ?>
  </table>
		</div>
		  <div class="col-sm-2"></div>
    </div>
  </div>
			<div class="col-sm-12">
				<br><br><br><br><br><br><br><br><br><br>
				<div class="panel panel-default">
    		  		<div class="panel-heading">© copyright 2021<p style="float:right">Developed by Beginner Developer</p></div>
  				</div>
		</div>
	</div>

</body>
</html>

