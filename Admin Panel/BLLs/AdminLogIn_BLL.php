<?PHP
    include "../DALs/AdminLogIn_DAL.php";
    class AdminLogIn_BLL{
        public function __construct(){
            $this->objAdminLogIn_DAL = new AdminLogIn_DAL();
        }

        public function getAdminDetail(AdminLogIn_Entity $objAdminLogIn_Entity){
             $this->objAdminLogIn_DAL->getAdminDetail($objAdminLogIn_Entity);
        }
        private $objAdminLogIn_DAL;
    }
?>