<?PHP
	class ModifyRecord_Entity{
		public function __construct($name="", $email = "", $pass= "", $city="", $address="", $phone=0, $gender="", $image=""){
			$this->setName($name);
			$this->setEmail($email);
			$this->setPass($pass);
			$this->setCity($city);
			$this->setAddress($address);
			$this->setPhone($phone);
			$this->setGender($gender);
			$this->setImage($image);
		}
		public function setName($name){
			if($name!=""){
				$this->name = $name;
			}else{
				$this->name="Undefined";
			}
		}
		public function setEmail($email){
			if($email != ""){
				$this->email = $email;
			}else{
				$this->email="Undefined";
			}
		}
		public function setPass($pass){
			if($pass != ""){
				$this->pass = $pass;
			}else{
				$this->pass="Undefined";
			}
		}
		public function setCity($city){
			if($city != ""){
				$this->city = $city;
			}else{
				$this->city="Undefined";
			}
		}
		public function setAddress($address){
			if($address != ""){
				$this->address = $address;
			}else{
				$this->address="Undefined";
			}
		}
		public function setPhone($phone){
			if($phone>0){
				$this->phone = $phone;
			}else{
				$this->phone=0;
			}
		}
		public function setGender($gender){
			if($gender != ""){
				$this->gender = $gender;
			}else{
				$this->gender="Undefined";
			}
		}
		public function setImage($image){
			if($image != ""){
				$this->image = $image;
			}else{
				$this->image="default.jpg";
			}
		}
		public function getName(){
			return $this->name;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getPass(){
			return $this->pass;
		}
		public function getCity(){
			return $this->city;
		}
		public function getAddress(){
			return $this->address;
		}
		public function getPhone(){
			return $this->phone;
		}
		public function getGender(){
			return $this->gender;
		}
		public function getImage(){
			return $this->image;
		}
		
		private $name;
		private $email;
		private $pass;
		private $city;
		private $address;
		private $phone;
		private $gender;
		private $image;
	}
?>