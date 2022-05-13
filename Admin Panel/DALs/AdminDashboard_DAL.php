<?PHP
	include "../Entities/AdminDashboard_Entity.php";
	include "../../Database Connectivity/DatabaseConnectivity.php";
	session_start();
	class AdminDashboard_DAL{
        public function __construct(){
            $objDatabaseConnectivity = new DatabaseConnectivity();
            $this->objConnection = $objDatabaseConnectivity->getConnection();
        }
        
		
        public function insertQuestion(AdminDashboard_Entity $objAdminDashboard_Entity){
            $query = "call insertQuestion(:qst, :opt1, :opt2, :opt3, :opt4, :trueOpt, :catID)";
            $statement = $this->objConnection->prepare($query);
			$question  = $objAdminDashboard_Entity->getQuestion();
            $option1  = $objAdminDashboard_Entity->getOption1();
            $option2  = $objAdminDashboard_Entity->getOption2();
            $option3  = $objAdminDashboard_Entity->getOption3();
            $option4  = $objAdminDashboard_Entity->getOption4();
            $trueOption  = $objAdminDashboard_Entity->getTrueOption();
            $categoryID  = $objAdminDashboard_Entity->getCategoryID();
			$statement->bindParam(":qst" ,$question);
            $statement->bindParam(":opt1" ,$option1);		
            $statement->bindParam(":opt2" ,$option2);		
            $statement->bindParam(":opt3" ,$option3);		
            $statement->bindParam(":opt4" ,$option4);		
            $statement->bindParam(":trueOpt" ,$trueOption);		
            $statement->bindParam(":catID" ,$categoryID);
			$statement->execute();
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



