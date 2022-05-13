<?PHP
class AddCategory_Entity{
	public function __construct($catName = ""){
			$this->setCategoryName($catName);
		}
	public function setCategoryName($catName){
		if($catName != ""){
			$this->catName = $catName;
		}else{
			$this->catName = "Undefined";
		}
	}
	
	public function getCategoryName(){
		return $this->catName;
	}
	
	private $catName;
}
?>