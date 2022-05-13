<?PHP
    include "../Entities/ShowTest_Entity.php";
    include "../Database Connectivity/DatabaseConnectivity.php";
	session_start();
    class ShowTest_DAL{
        public function __construct(){
            $objDatabaseConnectivity = new DatabaseConnectivity();
            $this->objConnection = $objDatabaseConnectivity->getConnection();
        }

        public function getAllQuestions(ShowTest_Entity $objShowTest_Entity){
            $query = "call getAllQuestions(:cat)";
            $statement = $this->objConnection->prepare($query);
            $catID  = $objShowTest_Entity->getCategoryID();
            $statement->bindParam(":cat", $catID);
            $statement->execute();
			$result=$statement->fetchAll();
			
			$i=1;
			foreach($result as $qust){ 
			echo '<form method="post" id="form1" action="Result_View.php">
		  			<table class="table table-bordered">
		  				<thead>
				<tr class="danger"><th>';
				echo $i; echo"&nbsp"; echo $qust['question'];
				echo '</th>
			  				</tr>
						</thead>
						<tbody>';
							if(isset($qust['ans1'])){
								echo '<tr class="info">
								<td>&nbsp;1&emsp;<input type="radio" value="0" name="'.$qust['id'].'"/>&nbsp;'.$qust['ans1'].'</td></tr>';
							} 
							if(isset($qust['ans2'])){
			  					echo '<tr class="info">
								<td>&nbsp;2&emsp;<input type="radio" value="1" name="'.$qust['id'].'" />&nbsp;'.$qust['ans2'].'</td></tr>';
			  				}
			  				if(isset($qust['ans3'])){
                        		echo '<tr class="info">
                        		<td>&nbsp;3&emsp;<input type="radio" value="2" name="'.$qust['id'].'"/>&nbsp;'.$qust['ans3'].'</td></tr>';
							}
                        	if(isset($qust['ans4'])){
                        		echo '<tr class="info">
                        		<td>&nbsp;4&emsp;<input type="radio" value="3" name="'.$qust['id'].'" />&nbsp;'.$qust['ans4'].'</td></tr>';
                      		}
							echo '<tr class="info">
								<td><input type="radio" checked="checked" style="display:none" value="no_attempt" name="'.$qust['id'].'" /></td>
			  					</tr>
							</tbody>
						</table>';
				$i++;
			}
			echo '<center><input type="submit" value="submit Quiz" class="btn btn-success" /></center>
		</form>';
		}
		
		public function getCategoryName($catID){
            $query = "call getCategoryName(:catID)";
            $statement = $this->objConnection->prepare($query);
			$statement->bindParam(":catID", $catID);
			$statement->execute();
			$result=$statement->fetchAll();
			$quizName = array();
			foreach($result as $row){
				
				$quizName['catName'] = $row['cat_name'];
            }
            return $quizName['catName'];
		}
		
        private $objConnection;
    }
?>