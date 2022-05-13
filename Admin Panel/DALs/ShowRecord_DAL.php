<?PHP
	include "../Entities/ShowRecord_Entity.php";
	include "../../Database Connectivity/DatabaseConnectivity.php";
	session_start();
	class ShowRecord_DAL{
        public function __construct(){
            $objDatabaseConnectivity = new DatabaseConnectivity();
            $this->objConnection = $objDatabaseConnectivity->getConnection();
        }
        
		
        public function getStudentResult($email){
            $query = "call getStudentResult(:emailID)";
            $statement = $this->objConnection->prepare($query);
			$statement->bindParam(":emailID" ,$email);
			$statement->execute();
			$results=$statement->fetchAll();
			$studentRecord = array();
            foreach($results as $row){
                $objShowRecord_Entity = new ShowRecord_Entity();

                $objShowRecord_Entity->setTotalQuestion($row["totalQuestion"]);
				$objShowRecord_Entity->setQuizName($row["quizName"]);
                $objShowRecord_Entity->setAttemptedQuestion($row["attemptedQuestion"]);
				$objShowRecord_Entity->setUnattemptedQuestion($row["unattemptedQuestion"]);
				$objShowRecord_Entity->setRightAnswer($row["rightAnswer"]);
				$objShowRecord_Entity->setWrongAnswer($row["wrongAnswer"]);
				$objShowRecord_Entity->setPercentage($row["percentage"]);
             
                $studentRecord[] = $objShowRecord_Entity;
            }
            return $studentRecord;
        }
		
		public function getStudentEmail(){
            $query = "call getStudentEmail()";
            $statement = $this->objConnection->prepare($query);		
			$statement->execute();
			$result=$statement->fetchAll();
			echo '<select class="form-control" id="email" name="email">
		  	<option value="0">Select User</option>';
		  	foreach($result as $row)
			{	
				echo '<option value='.$row["email"].'>'.$row["email"].'</option>';
			}
			echo '</select><br>';
		}
		
		private $objConnection;
	}
?>