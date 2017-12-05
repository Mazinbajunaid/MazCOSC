<?php

class Province 
{

    public $id;
	public $name;
    public function __construct() {
        
    }

    public function getProvinceList() 
	{	 
		$db = db_connect();
        $statement = $db->prepare("select * from province;");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) 
		{
			return $rows;
		}
    }
}
