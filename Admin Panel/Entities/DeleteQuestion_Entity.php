<?PHP
class DeleteQuestion_Entity{
	public function __construct($qstID = 0){
		$this->setQuestionID($qstID);
	}
	public function setQuestionID($qstID){
		if($qstID > 0){
			$this->qstID = $qstID;
		}else{
			$this->qstID = 0;
		}
	}
	
	public function getQuestionID(){
		return $this->qstID;
	}
	
	private $qstID;
}
?>