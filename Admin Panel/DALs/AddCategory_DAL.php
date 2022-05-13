<?PHP
	include "../Entities/AddCategory_Entity.php";
	include "../../Database Connectivity/DatabaseConnectivity.php";
	session_start();
	class AddCategory_DAL{
        public function __construct(){
            $objDatabaseConnectivity = new DatabaseConnectivity();
            $this->objConnection = $objDatabaseConnectivity->getConnection();
        }
        
		
        public function insertCategory(AddCategory_Entity $objAddCategory_Entity){
            $query = "call insertCategory(:categoryName)";
            $statement = $this->objConnection->prepare($query);
			$catName  = $objAddCategory_Entity->getCategoryName();
			$statement->bindParam(":categoryName" ,$catName);
			$statement->execute();
        }
		
		private $objConnection;
	}
?>