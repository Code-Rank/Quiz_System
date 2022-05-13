<?PHP
class AdminDashboard_Entity{
	public function __construct($qst = "", $opt1 = "", $opt2 = "", $opt3 = "", $opt4 = "", $trueOpt = 0, $catID = 0){
			$this->setQuestion($qst);
			$this->setOption1($opt1);
			$this->setOption2($opt2);
			$this->setOption3($opt3);
			$this->setOption4($opt4);
			$this->setTrueOption($trueOpt);
			$this->setCategoryID($catID);
		}
	public function setQuestion($qst){
		if($qst != ""){
			$this->qst = $qst;
		}else{
			$this->qst = "Undefined";
		}
	}
	public function setOption1($opt1){
		if($opt1 != ""){
			$this->opt1 = $opt1;
		}else{
			$this->opt1 = "Undefined";
		}
	}
	public function setOption2($opt2){
		if($opt2 != ""){
			$this->opt2 = $opt2;
		}else{
			$this->opt2 = "Undefined";
		}
	}
	public function setOption3($opt3){
		if($opt3 != ""){
			$this->opt3 = $opt3;
		}else{
			$this->opt3 = "Undefined";
		}
	}
	public function setOption4($opt4){
		if($opt4 != ""){
			$this->opt4 = $opt4;
		}else{
			$this->opt4 = "Undefined";
		}
	}
	public function setTrueOption($trueOpt){
		if($trueOpt > 0){
			$this->trueOpt = $trueOpt;
		}else{
			$this->trueOpt = 0;
		}
	}
	public function setCategoryID($catID){
		if($catID > 0){
			$this->catID = $catID;
		}else{
			$this->catID = 0;
		}
	}
	
	public function getQuestion(){
		return $this->qst;
	}
	public function getOption1(){
		return $this->opt1;
	}
	public function getOption2(){
		return $this->opt2;
	}
	public function getOption3(){
		return $this->opt3;
	}
	public function getOption4(){
		return $this->opt4;
	}
	public function getTrueOption(){
		return $this->trueOpt;
	}
	public function getCategoryID(){
		return $this->catID;
	}
	
	private $qst;
	private $opt1;
	private $opt2;
	private $opt3;
	private $opt4;
	private $trueOpt;
	private $catID;
}
?>