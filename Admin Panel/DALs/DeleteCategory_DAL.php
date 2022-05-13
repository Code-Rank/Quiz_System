<?PHP
	include "../Entities/DeleteCategory_Entity.php";
	include "../../Database Connectivity/DatabaseConnectivity.php";
	session_start();
	class DeleteCategory_DAL{
        public function __construct(){
            $objDatabaseConnectivity = new DatabaseConnectivity();
            $this->objConnection = $objDatabaseConnectivity->getConnection();
        }
        
        public function deleteCategory(DeleteCategory_Entity $objDeleteCategory_Entity){
            $query = "call deleteCategory(:catID)";
            $statement = $this->objConnection->prepare($query);
			$categoryID  = $objDeleteCategory_Entity->getcategoryID();		
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