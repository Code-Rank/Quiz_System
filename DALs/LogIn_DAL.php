<?PHP
	include "../Entities/LogIn_Entity.php";
	include "../Database Connectivity/DatabaseConnectivity.php";
	session_start();
	class LogIn_DAL{
        public function __construct(){
            $objDatabaseConnectivity = new DatabaseConnectivity();
            $this->objConnection = $objDatabaseConnectivity->getConnection();
        }
        
		
        public function getUserDetail(LogIn_Entity $objLogIn_Entity){
            $query = "call getUserDetail(:loginID, :pin)";
            $statement = $this->objConnection->prepare($query);
			$loginID  = $objLogIn_Entity->getLogin();
            $pass  = $objLogIn_Entity->getPass();
			$statement->bindParam(":loginID" ,$loginID);
            $statement->bindParam(":pin" ,$pass);		
			$statement->execute();
			$count=$statement->rowCount();
				if($count>0){
                        $_SESSION['email']=$loginID;
					if (isset($_SESSION['email'])){
						echo "<script> window.location.href = 'home_View.php'; </script>";
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