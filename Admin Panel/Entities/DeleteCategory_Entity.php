<?PHP
class DeleteCategory_Entity{
	public function __construct($catID = 0){
		$this->setCategoryID($catID);
	}
	public function setCategoryID($catID){
		if($catID > 0){
			$this->catID = $catID;
		}else{
			$this->catID = 0;
		}
	}
	
	public function getCategoryID(){
		return $this->catID;
	}
	
	private $catID;
}
?>