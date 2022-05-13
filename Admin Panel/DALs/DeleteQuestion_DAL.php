<?PHP
	include "../Entities/DeleteQuestion_Entity.php";
	include "../../Database Connectivity/DatabaseConnectivity.php";
	session_start();
	class DeleteQuestion_DAL{
        public function __construct(){
            $objDatabaseConnectivity = new DatabaseConnectivity();
            $this->objConnection = $objDatabaseConnectivity->getConnection();
        }
        
        public function deleteQuestion(DeleteQuestion_Entity $objDeleteQuestion_Entity){
            $query = "call deleteQuestion(:qstID)";
            $statement = $this->objConnection->prepare($query);
			$qstID  = $objDeleteQuestion_Entity->getQuestionID();	
            $statement->bindParam(":qstID" ,$qstID);
			$statement->execute();
        }
		
		public function getQuestionForDeletion($catID){
            $query = "call getQuestionForDeletion(:catID)";
            $statement = $this->objConnection->prepare($query);	
            $statement->bindParam(":catID" ,$catID);
			$statement->execute();
			$results=$statement->fetchAll();
			echo '<br><br><select class="form-control" id="qst" name="qst">
		  	<option value="0">select question to delete</option>';
		  	foreach($results as $question)
			{	
				echo '<option value='.$question["id"].'>'.$question["question"].'</option>';
			}
			echo '</select><br>';
        }
		
		public function getAllCategory(){
            $query = "call getCategory()";
            $statement = $this->objConnection->prepare($query);		
			$statement->execute();
			$result=$statement->fetchAll();
			echo '<select class="form-control" id="cat" name="cat">
		  	<option value="0">select category</option>';
		  	foreach($result as $category)
			{	
				echo '<option value='.$category["id"].'>'.$category["cat_name"].'</option>';
			}
			echo '</select><br>';
		}
		
		private $objConnection;
	}
?>