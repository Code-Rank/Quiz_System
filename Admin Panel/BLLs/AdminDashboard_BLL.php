<?PHP
    include "../DAls/AdminDashboard_DAL.php";
    class AdminDashboard_BLL{
        public function __construct(){
            $this->objAdminDashboard_DAL = new AdminDashboard_DAL();
        }

        public function insertQuestion(AdminDashboard_Entity $objAdminDashboard_Entity){
             $this->objAdminDashboard_DAL->insertQuestion($objAdminDashboard_Entity);
        }
		
		public function getAllCategory(){
            $this->objAdminDashboard_DAL->getAllCategory();
        }
		
        private $objAdminDashboard_DAL;
    }
?>