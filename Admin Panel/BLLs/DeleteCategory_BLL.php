<?PHP
    include "../DALs/DeleteCategory_DAL.php";
    class DeleteCategory_BLL{
        public function __construct(){
            $this->objDeleteCategory_DAL = new DeleteCategory_DAL();
        }

        public function deleteCategory(DeleteCategory_Entity $objDeleteCategory_Entity){
             $this->objDeleteCategory_DAL->deleteCategory($objDeleteCategory_Entity);
        }
		
		public function getAllCategory(){
            $this->objDeleteCategory_DAL->getAllCategory();
        }
		
        private $objDeleteCategory_DAL;
    }
?>