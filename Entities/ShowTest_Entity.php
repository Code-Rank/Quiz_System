<?PHP 
	class ShowTest_Entity{
		public function __construct($categoryID = 0){
			$this->getCategoryID($categoryID);
		}
		public function setCategoryID($catID){
			if($catID>0){
				$this->catID = $catID;
			}else{
				$this->catID=0;
			}
		}

		public function getCategoryID(){
			return $this->catID;
		}

		private $catID;
	}
?>