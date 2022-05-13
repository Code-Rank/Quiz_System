<?PHP
    include "../DALs/DeleteQuestion_DAL.php";
    class DeleteQuestion_BLL{
        public function __construct(){
            $this->objDeleteQuestion_DAL = new DeleteQuestion_DAL();
        }

        public function deleteQuestion(DeleteQuestion_Entity $objDeleteQuestion_Entity){
             $this->objDeleteQuestion_DAL->DeleteQuestion($objDeleteQuestion_Entity);
        }
		public function getQuestionForDeletion($catID){
            $this->objDeleteQuestion_DAL->getQuestionForDeletion($catID);
        }
		public function getAllCategory(){
            $this->objDeleteQuestion_DAL->getAllCategory();
        }
		
        private $objDeleteQuestion_DAL;
    }
?>