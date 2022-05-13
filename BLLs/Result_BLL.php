<?PHP
    include "../DALs/Result_DAL.php";
    class Result_BLL{
        public function __construct(){
            $this->objResult_DAL = new Result_DAL();
        }
		
        public function getResult($catID,$data){
            return $this->objResult_DAL->getResult($catID,$data);
        }
		
		public function insertStudentResult(Result_Entity $objResult_Entity){
			$this->objResult_DAL->insertStudentResult($objResult_Entity);
		}
		public function getCategoryName($catID){
			return $this->objResult_DAL->getCategoryName($catID);
		}

        private $objResult_DAL;
    }
?>