<?php

class City
{

    public $id;
	public $name;

    public function __construct() {
        
    }

    public function getCityList($pid) 
	{
		 
		$db = db_connect();
        $statement = $db->prepare("select * from city where pid = :pid ;");
		$statement->bindValue(':pid', $pid);
        $statement->execute();
       // $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		 while($tmp = $statement->fetch() ) {
				$json_result[] = $tmp['cityname'];
			}
		return $json_result;
    }
}
