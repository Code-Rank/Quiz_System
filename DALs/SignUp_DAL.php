<?PHP
    include "../Entities/SignUp_Entity.php";
    include "../Database Connectivity/DatabaseConnectivity.php";

    class SignUp_DAL{
        public function __construct(){
            $objDatabaseConnectivity = new DatabaseConnectivity();
            $this->objConnection = $objDatabaseConnectivity->getConnection();
        }
        
        public function insertStudentData(SignUp_Entity $objSignUp_Entity){
            $query = "call insertStudentData(:userName, :emailID, :pin, :userCity, :userAddress, :type, :number, :profilePic)";
            $statement = $this->objConnection->prepare($query);
			
			$userName  = $objSignUp_Entity->getName();
            $emailID  = $objSignUp_Entity->getEmail();
            $pin  = $objSignUp_Entity->getPass();
            $userCity  = $objSignUp_Entity->getCity();
            $userAddress  = $objSignUp_Entity->getAddress();
            $type  = $objSignUp_Entity->getGender();
            $number  = $objSignUp_Entity->getPhone();
            $profilepic  = $objSignUp_Entity->getImage();
			
			$statement->bindParam(":userName" , $userName);
            $statement->bindParam(":emailID" , $emailID);
            $statement->bindParam(":pin" , $pin);
            $statement->bindParam(":userCity" , $userCity);
            $statement->bindParam(":userAddress" , $userAddress);	
            $statement->bindParam(":type" , $type);
            $statement->bindParam(":number" , $number);		
            $statement->bindParam(":profilePic" , $profilepic);		
            $statement->execute();
        }
		
		public function checkEmailExistance($email){
			$query = "call checkEmailExistance(:ID)";
            $statement = $this->objConnection->prepare($query);
            $statement->bindParam(":ID" , $email);	
            $statement->execute();
			$count=$statement->rowCount();
			return $count;
		}
		
        private $objConnection;
    }
?>