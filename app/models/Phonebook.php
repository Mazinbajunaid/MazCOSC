<?php

class Phonebook {

    public $id;
	public $name;
	public $phone;

    public function __construct() {
        
    }

    public function getPhoneList() 
	{
		 
		$db = db_connect();
        $statement = $db->prepare("select * from phonebook;");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) 
		{
			return $rows;
		}
    }
	
	
    public function getFilterPhoneList($pname) 
	{
		 
		$db = db_connect();
        $statement = $db->prepare("select * from phonebook where name Like :pname;");
		 $statement->bindValue(':pname', $pname);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) 
		{
			return $rows;
		}
	}
}
