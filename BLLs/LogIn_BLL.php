<?PHP
    include "../DALs/LogIn_DAL.php";
    class LogIn_BLL{
        public function __construct(){
            $this->objLogIn_DAL = new LogIn_DAL();
        }

        public function getUserDetail(LogIn_Entity $objLogIn_Entity){
             $this->objLogIn_DAL->getUserDetail($objLogIn_Entity);
        }
        private $objLogIn_DAL;
    }
?>