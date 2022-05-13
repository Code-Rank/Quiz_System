<?PHP
	include "../Entities/AdminLogIn_Entity.php";
	include "../../Database Connectivity/DatabaseConnectivity.php";
	session_start();
	class AdminLogIn_DAL{
        public function __construct(){
            $objDatabaseConnectivity = new DatabaseConnectivity();
            $this->objConnection = $objDatabaseConnectivity->getConnection();
        }
        
		
        public function getAdminDetail(AdminLogIn_Entity $objAdminLogIn_Entity){
            $query = "call getAdminDetail(:loginID, :pin)";
            $statement = $this->objConnection->prepare($query);
			$loginID  = $objAdminLogIn_Entity->getLogin();
            $pass  = $objAdminLogIn_Entity->getPass();
			$statement->bindParam(":loginID" ,$loginID);
            $statement->bindParam(":pin" ,$pass);		
			$statement->execute();
			$count=$statement->rowCount();
				if($count>0){
                        $_SESSION['loginID']=$loginID;
					if (isset($_SESSION['loginID'])){
						echo "<script> window.location.href = 'AdminDashboard_View.php'; </script>";
					}
					return true;
				}else{
					echo '<br><div class="alert alert-danger">
					<strong>Invalid username or password</strong>
					</div>';
					return false;		
				}
        }
		private $objConnection;
	}
?>