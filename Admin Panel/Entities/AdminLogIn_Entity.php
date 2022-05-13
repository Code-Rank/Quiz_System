<?PHP
class AdminLogIn_Entity{
	public function __construct($loginID = "", $pass= ""){
			$this->setLogin($loginID);
			$this->setPass($pass);
		}
	public function setLogin($loginID){
		if($loginID != ""){
			$this->loginID = $loginID;
		}else{
			$this->loginID = "Undefined";
		}
	}
	public function setPass($pass){
		if($pass != ""){
			$this->pass = $pass;
		}else{
			$this->pass = "Undefined";
		}
	}
	public function getLogin(){
		return $this->loginID;
	}
	public function getPass(){
		return $this->pass;
	}
	private $loginID;
	private $pass;
}
?>