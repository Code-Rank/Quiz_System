<?PHP
class ShowRecord_Entity{
	public function __construct($emailID="", $quizName="", $totalQst=0, $attemptedQst=0, $unattemptedQst=0, $rightAns=0, $wrongAns=0, $percentage=0.0){
		$this->setEmailID($emailID);
		$this->setQuizName($quizName);
		$this->setTotalQuestion($totalQst);
		$this->setAttemptedQuestion($attemptedQst);
		$this->setUnattemptedQuestion($unattemptedQst);
		$this->setRightAnswer($rightAns);
		$this->setWrongAnswer($wrongAns);
		$this->setPercentage($percentage);
	}
	public function setEmailID($emailID){
		if($emailID != ""){
			$this->emailID = $emailID;
		}else{
			$this->emailID = "Undefined";
		}
	}
	public function setQuizName($quizName){
		if($quizName != ""){
			$this->quizName = $quizName;
		}else{
			$this->quizName = "Undefined";
		}
	}
	public function setTotalQuestion($totalQst){
        if($totalQst > 0){
            $this->totalQst = $totalQst;
        }else{
            $this->totalQst = 0;
        }
	}
	public function setAttemptedQuestion($attemptedQst){
		if($attemptedQst > 0){
			$this->attemptedQst = $attemptedQst;
		}else{
			$this->attemptedQst = 0;
		}
	}
	public function setUnattemptedQuestion($unattemptedQst){
		if($unattemptedQst > 0){
			$this->unattemptedQst = $unattemptedQst;
		}else{
			$this->unattemptedQst = 0;
		}
	}
	public function setRightAnswer($rightAns){
		if($rightAns > 0){
				$this->rightAns = $rightAns;
		}else{
			$this->rightAns = 0;
		}
	}
	public function setWrongAnswer($wrongAns){
		if($wrongAns > 0){
			$this->wrongAns = $wrongAns;
		}else{
			$this->wrongAns = 0;
		}
	}
	public function setPercentage($percentage){
		if($percentage > 0.0){
			$this->percentage = $percentage;
		}else{
			$this->percentage = 0.0;
		}
	}
	
	public function getTotalQuestion(){
		return $this->totalQst;
	}
	public function getQuizName(){
		return $this->quizName;
	}
	public function getAttemptedQuestion(){
		return $this->attemptedQst;
	}
	public function getUnattemptedQuestion(){
		return $this->unattemptedQst;
	}
	public function getRightAnswer(){
		return $this->rightAns;
	}
	public function getWrongAnswer(){
		return $this->wrongAns;
	}
	public function getPercentage(){
		return $this->percentage;
	}
	public function getEmailID(){
		return $this->emailID;
	}
	
	private $totalQst;
	private $quizName;
	private $attemptedQst;
	private $unattemptedQst;
	private $rightAns;
	private $wrongAns;
	private $percentage;
	private $emailID;
}
?>