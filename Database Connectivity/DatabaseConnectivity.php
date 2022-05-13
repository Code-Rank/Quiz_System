<?PHP
	class DatabaseConnectivity{
		public function __construct(){
			$this->connection = new PDO("mysql:host=localhost; dbname=quizsystem", "root", "");
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		public function getConnection(){
			return $this->connection;
		}
		private $connection;
	}
?>