<?PHP
    include "../DALs/ShowRecord_DAL.php";
    class ShowRecord_BLL{
        public function __construct(){
            $this->objShowRecord_DAL = new ShowRecord_DAL();
        }

        public function getStudentResult($email){
             return $this->objShowRecord_DAL->getStudentResult($email);
        }
		public function getStudentEmail(){
             $this->objShowRecord_DAL->getStudentEmail();
        }
		
        private $objShowRecord_DAL;
    }
?>