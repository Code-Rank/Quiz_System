<?php
include "../BLLs/ShowTest_BLL.php";
$objShowTest_BLL = new ShowTest_BLL(); 
$objShowTest_Entity = new ShowTest_Entity(); 
$category=$_POST['cat'];
$objShowTest_Entity->setCategoryID($category);
$_SESSION['cat']=$category;
$quizName=$objShowTest_BLL->getCategoryName($category);
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function timeout()
	{
		var hours=Math.floor(timeLeft/3600);
		var minute=Math.floor((timeLeft-(hours*60*60)-30)/60);
		var second=timeLeft%60;
		var hrs=checktime(hours);
		var mint=checktime(minute);
		var sec=checktime(second);
		
		if(timeLeft<=0)
		{
			clearTimeout(tm);
			document.getElementById("form1").submit();
		}
		else
		{

			document.getElementById("time").innerHTML=hrs+":"+mint+":"+sec;
		}
		timeLeft--;
		var tm= setTimeout(function(){timeout()},1000);
	}
	function checktime(msg)
	{
		if(msg<10)
		{
			msg="0"+msg;
		}
		return msg;
	}
	</script>
  
</head>
<body onload="timeout()" >
 
<div class="container">
  <ul class="nav nav-tabs">
    <li ><a href="Home_View.php">Cancel Quiz</a></li>
    <li style="float:right"><a href="../Logout.php">Logout</a></li>
  </ul>
	<div class="tab-content">
		<div id="home">
		  <script type="text/javascript">
		  var timeLeft=1*15*60;
		  
		  </script>
		  
		  <h2><?PHP echo $quizName;?>
			  <div id="time" style="float:right">timeout</div></h2>
			<?PHP
			
				$objShowTest_BLL->getAllQuestions($objShowTest_Entity);
			?>
						
<div class="col-sm-2"></div>
		</div>
	</div>
	<div class="col-sm-12">
				<br><br>
				<div class="panel panel-default">
    		  		<div class="panel-heading">© copyright 2021<p style="float:right">Developed by Beginner Developer</p></div>
  				</div>
		</div>
</div>

</body>
</html>
