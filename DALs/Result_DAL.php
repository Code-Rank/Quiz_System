<?PHP
	include "../Entities/Result_Entity.php";
	include "../Database Connectivity/DatabaseConnectivity.php";
	session_start();
	class Result_DAL{
        public function __construct(){
            $objDatabaseConnectivity = new DatabaseConnectivity();
            $this->objConnection = $objDatabaseConnectivity->getConnection();
        }
        
        public function getResult($catID,$data){
            $query = "call getResult(:categoryID)";
            $statement = $this->objConnection->prepare($query);
			$statement->bindParam(":categoryID" ,$catID);		
			$statement->execute();
			$answer = $statement->fetchAll();
			$count = $statement->rowCount();
			
			$ans=implode("",$data);
		 	$right=0;
		 	$wrong=0;
		 	$no_answer=0;
			
			foreach($answer as $qust){			
              if($qust['ans']==$_POST[$qust['id']]){
                   $right++;
              }elseif($_POST[$qust['id']]=="no_attempt"){
                   $no_answer++;
              }else{
                  $wrong++;
              }
			}
			$result=array();
			$result['right']=$right;
			$result['wrong']=$wrong;
			$result['no_answer']=$no_answer;
			return $result;
		}
		
		public function getCategoryName($catID){
            $query = "call getCategoryName(:catID)";
            $statement = $this->objConnection->prepare($query);
			$statement->bindParam(":catID", $catID);
			$statement->execute();
			$result=$statement->fetchAll();
			$quizName = array();
			foreach($result as $row){
				
				$quizName['catName'] = $row['cat_name'];
            }
            return $quizName['catName'];
		}
		
		public function insertStudentResult(Result_Entity $objResult_Entity){
            $query = "call insertStudentResult(:totalQst, :testName, :attemptedQst, :unattemptedQst, :rightAns, :wrongAns, :percent, :email)";
            $statement = $this->objConnection->prepare($query);
			$testName = $objResult_Entity->getQuizName();
			$totalQst = $objResult_Entity->getTotalQuestion();
			$attemptQst = $objResult_Entity->getAttemptedQuestion();
			$unattemptQst = $objResult_Entity->getUnattemptedQuestion();
			$rightAns = $objResult_Entity->getRightAnswer();
			$wrongAns = $objResult_Entity->getWrongAnswer();
			$percent = $objResult_Entity->getPercentage();
			$email = $objResult_Entity->getEmail();
			$statement->bindParam(":testName", $testName);
			$statement->bindParam(":totalQst", $totalQst);
			$statement->bindParam(":attemptedQst", $attemptQst);
			$statement->bindParam(":unattemptedQst", $unattemptQst);
			$statement->bindParam(":rightAns", $rightAns);
			$statement->bindParam(":wrongAns", $wrongAns);
			$statement->bindParam(":percent", $percent);
			$statement->bindParam(":email", $email);
			$statement->execute();
		}
		
		private $objConnection;
	}
?>