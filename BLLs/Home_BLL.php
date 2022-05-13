<?PHP
    include "../DALs/Home_DAL.php";
    class Home_BLL{
        public function __construct(){
            $this->objHome_DAL = new Home_DAL();
        }
        public function getUserEmail(Home_Entity $objHome_Entity){
            $this->objHome_DAL->getUserEmail($objHome_Entity);
        }
		public function getAllCategory(){
            $this->objHome_DAL->getAllCategory();
        }
		public function getStudentResult($email){
            return $this->objHome_DAL->getStudentResult($email);
        }

        private $objHome_DAL;
    }
?>