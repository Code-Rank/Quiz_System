<?PHP
    include "../Entities/ModifyRecord_Entity.php";
    include "../Database Connectivity/DatabaseConnectivity.php";
	session_start();
    class ModifyRecord_DAL{
        public function __construct(){
            $objDatabaseConnectivity = new DatabaseConnectivity();
            $this->objConnection = $objDatabaseConnectivity->getConnection();
        }
        
        public function modifyStudentProfile(ModifyRecord_Entity $objModifyRecord_Entity){
            $query = "call modifyStudentProfile(:sName, :emailID, :pin, :sCity, :sAddress, :stype, :sNum, :image)";
            $statement = $this->objConnection->prepare($query);
			
			$sName  = $objModifyRecord_Entity->getName();
            $emailID  = $objModifyRecord_Entity->getEmail();
            $pin  = $objModifyRecord_Entity->getPass();
            $sCity  = $objModifyRecord_Entity->getCity();
            $sAddress  = $objModifyRecord_Entity->getAddress();
            $stype  = $objModifyRecord_Entity->getGender();
            $sNum  = $objModifyRecord_Entity->getPhone();
            $img = $objModifyRecord_Entity->getImage();
            
			$statement->bindParam(":sName" , $sName);
            $statement->bindParam(":emailID" , $emailID);
            $statement->bindParam(":pin" , $pin);
            $statement->bindParam(":sCity" , $sCity);
            $statement->bindParam(":sAddress" , $sAddress);	
            $statement->bindParam(":stype" , $stype);
            $statement->bindParam(":sNum" , $sNum);		
            $statement->bindParam(":image" , $img);		
            $statement->execute();
        }
		
		public function getStudentByEmail($email){
            $query = "call getStudentByEmail(:emailID)";
            $statement = $this->objConnection->prepare($query);
            $statement->bindParam(":emailID" , $email);
			$statement->execute();
            $results=$statement->fetchAll();
			$studentRecord=array();
			foreach($results as $row){
				$objModifyRecord_Entity = new ModifyRecord_Entity();
                $objModifyRecord_Entity->setName($row['name']);
                $objModifyRecord_Entity->setPass($row['pass']);
                $objModifyRecord_Entity->setCity($row['city']);
                $objModifyRecord_Entity->setAddress($row['address']);
                $objModifyRecord_Entity->setGender($row['gender']);
                $objModifyRecord_Entity->setPhone($row['phoneNumber']);
                $objModifyRecord_Entity->setImage($row['img']);
				
				$studentRecord[] = $objModifyRecord_Entity;
			}
			return $studentRecord;
        }
		
		
		
        private $objConnection;
    }
?>