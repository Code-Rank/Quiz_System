<?PHP
	include "../Entities/Home_Entity.php";
	include "../Database Connectivity/DatabaseConnectivity.php";
	session_start();
	class Home_DAL{
        public function __construct(){
            $objDatabaseConnectivity = new DatabaseConnectivity();
            $this->objConnection = $objDatabaseConnectivity->getConnection();
        }
        public function getUserEmail(Home_Entity $objHome_Entity){
            $query = "call getUserEmail(:userEmail)";
            $statement = $this->objConnection->prepare($query);
			$userEmail  = $objHome_Entity->getEmailID();
			$statement->bindParam(":userEmail" ,$userEmail);		
			$statement->execute();
			$result = $statement->fetchAll();
			foreach($result as $prof){
				echo 
				'<div class="col-sm-2"><img src="../images/'.$prof["img"] .'" class="img-circle" alt="Profile picture" width="110" height="106"></div><br>
				<div class="col-sm-4"><label>Roll No:&nbsp</label>'.$prof["id"].'<br>
				<label>Name:&nbsp</label>'.$prof["name"].'<br>
				<label>Email:&nbsp</label>'.$prof["email"].'<br>
				<label>Password:&nbsp</label>'.$prof["pass"].'<br>
				<label>City:&nbsp</label>'.$prof["city"].'<br>
				<label>Address:&nbsp</label>'.$prof["address"].'<br>
				<label>Gender:&nbsp</label>'.$prof["gender"].'<br>
				<label>Phone Number:&nbsp</label>'.$prof["phoneNumber"].'<br><br>
				<a class="btn btn-default" style="float:right" href="ModifyRecord_View.php"><span class="glyphicon glyphicon-edit"></span> Edit Profile</a></div><br>';
			}
		}
		public function getAllCategory(){
            $query = "call getCategory()";
            $statement = $this->objConnection->prepare($query);		
			$statement->execute();
			$result=$statement->fetchAll();
			echo '<select class="form-control" name="cat">
		  	<option value="0">select category</option>';
		  	foreach($result as $category)
			{	
				echo '<option value='.$category["id"].'>'.$category["cat_name"].'</option>';
			}
			echo '</select><br>';
			
		}
		
		public function getStudentResult($email){
            $query = "call getStudentResult(:emailID)";
            $statement = $this->objConnection->prepare($query);
			$statement->bindParam(":emailID", $email);
			$statement->execute();
			$results=$statement->fetchAll();
			$studentRecord = array();
            foreach($results as $row){
                $objHome_Entity = new Home_Entity();

                $objHome_Entity->setTotalQuestion($row["totalQuestion"]);
				$objHome_Entity->setQuizName($row["quizName"]);
                $objHome_Entity->setAttemptedQuestion($row["attemptedQuestion"]);
				$objHome_Entity->setUnattemptedQuestion($row["unattemptedQuestion"]);
				$objHome_Entity->setRightAnswer($row["rightAnswer"]);
				$objHome_Entity->setWrongAnswer($row["wrongAnswer"]);
				$objHome_Entity->setPercentage($row["percentage"]);
             
                $studentRecord[] = $objHome_Entity;
            }
            return $studentRecord;
		}

		private $objConnection;
	}
?>