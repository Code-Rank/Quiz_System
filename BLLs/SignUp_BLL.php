<?PHP
    include "../DALs/SignUp_DAL.php";
    class SignUp_BLL{
        public function __construct(){
            $this->objSignUp_DAL = new SignUp_DAL();
        }
        public function insertStudentData(SignUp_Entity $objSignUp_Entity){
            $this->objSignUp_DAL->insertStudentData($objSignUp_Entity);
        }
		public function checkEmailExistance($email){
            return $this->objSignUp_DAL->checkEmailExistance($email);
        }
		
        private $objSignUp_DAL;
    }
?>