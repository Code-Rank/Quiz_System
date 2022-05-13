<?PHP
    include "../DALs/ModifyRecord_DAL.php";
    class ModifyRecord_BLL{
        public function __construct(){
            $this->objModifyRecord_DAL = new ModifyRecord_DAL();
        }
        public function modifyStudentProfile(ModifyRecord_Entity $objModifyRecord_Entity){
            $this->objModifyRecord_DAL->modifyStudentProfile($objModifyRecord_Entity);
        }
		public function getStudentByEmail($email){
            return $this->objModifyRecord_DAL->getStudentByEmail($email);
        }
		
        private $objModifyRecord_DAL;
    }
?>