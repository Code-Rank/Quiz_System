<?PHP
    include "../DALs/AddCategory_DAL.php";
    class AddCategory_BLL{
        public function __construct(){
            $this->objAddCategory_DAL = new AddCategory_DAL();
        }

        public function insertCategory(AddCategory_Entity $objAddCategory_Entity){
             $this->objAddCategory_DAL->insertCategory($objAddCategory_Entity);
        }
		
        private $objAddCategory_DAL;
    }
?>