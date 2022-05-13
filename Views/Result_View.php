<?php
include "../BLLs/Result_BLL.php";
$objResult_BLL=new Result_BLL();
$objResult_Entity = new Result_Entity();
$quizID=$_SESSION['cat'];
$answer=$objResult_BLL->getResult($quizID,$_POST);
$quizName=$objResult_BLL->getCategoryName($quizID);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Result</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>
	<br>
	<br>
	<center>
	<?php
		$totalQst=$answer['right']+$answer['wrong']+$answer['no_answer'];
		$attemptedQst=$answer['right']+$answer['wrong'];
	?>
	<div class="container">
  <ul class="nav nav-tabs">
    <li ><a href="Home_View.php">Home</a></li>
    <li style="float:right"><a href="../Logout.php">Logout</a></li>
  </ul>
	<div class="tab-content">
		<div id="home">
	<div class="col-sm-3"></div>
		<div class="col-sm-6">
				<br>
			  <div class="panel panel-default">
				<div class="panel-heading"><center><h1>Report</h1></center></div>
				<div class="panel-heading"><center><h4>Subject Name <br><br><b><?php echo $quizName; ?></b></h4></center></div>
				<div class="panel-heading"><center><h4>Total Questions <br><br><b><?php echo $totalQst; ?></b></h4></center></div>
				<div class="panel-heading"><center><h4>Attempted Qusetions <br><br><b><?php echo $attemptedQst;?></b></h4></center></div>
				<div class="panel-heading"><center><h4>Right Answers <br><br><b><?php echo $answer['right'];?></b></h4></center></div>
				<div class="panel-heading"><center><h4>Wrong Answers <br><br><b><?php echo $answer['wrong'];?></b></h4></center> </div>
				<div class="panel-heading"><center><h4>Unattempted Questions <br><br><b><?php echo $answer['no_answer'];?></b></h4></center></div>
				<div class="panel-heading"><center><h4>Quiz Percentage <br><br><b><?php $per=($answer['right']*100)/($totalQst); echo $per=sprintf('%.2f', $per)."%";?></b></h4></center></div>
			  </div>
  <div class="col-sm-3"></div>
				</div>
			</div>
		</div>
	</div>
		<?PHP
			$objResult_Entity->setQuizName($quizName);
			$objResult_Entity->setTotalQuestion($totalQst);
			$objResult_Entity->setAttemptedQuestion($attemptedQst);
			$objResult_Entity->setUnattemptedQuestion($answer['no_answer']);
			$objResult_Entity->setRightAnswer($answer['right']);
			$objResult_Entity->setWrongAnswer($answer['wrong']);
			$objResult_Entity->setPercentage($per);
			$objResult_Entity->setEmail($_SESSION['email']);
			$objResult_BLL->insertStudentResult($objResult_Entity);
		?>
	</center>
</body>
</html>