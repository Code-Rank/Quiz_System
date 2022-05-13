<?PHP
    include "../DALs/ShowTest_DAL.php";
    class ShowTest_BLL{
        public function __construct(){
            $this->objShowTest_DAL = new ShowTest_DAL();
        }
		
        public function getAllQuestions(ShowTest_Entity $objShowTest_Entity){
            $this->objShowTest_DAL->getAllQuestions($objShowTest_Entity);
        }
		
		public function getCategoryName($catID){
			return $this->objShowTest_DAL->getCategoryName($catID);
		}
		
        private $objShowTest_DAL;
    }
?>