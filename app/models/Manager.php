<?php

class Manager {

    public $id;
    public $name;
	public $email;
	public $dob;
	public $password;
	public $phone;
	public $province;
	public $city;

    public function __construct() {
        
    }

	public function insert()
	{
		$db = db_connect();
        $statement = $db->prepare("INSERT INTO manager (name,email,password,dob,phone,province,city)"
                . " VALUES (:name,:email,:password,:dob,:phone,:province,:city); ");

        $statement->bindValue(':name', $this->name);		
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':password', md5($this->password));	
        $statement->bindValue(':dob', $this->dob);
        $statement->bindValue(':phone', $this->phone);
        $statement->bindValue(':province', $this->province);
        $statement->bindValue(':city', $this->city);		
        $statement->execute();	
	}
	
	public function getProfile()
	{
		$db = db_connect();
        $statement = $db->prepare("select * from manager WHERE managerID = :managerID");
        $statement->bindValue(':managerID', $_SESSION['managerID']);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) 
		{
			return $rows;
		}
  
	}
	
	public function getAllManagers()
	{
		$db = db_connect();
        $statement = $db->prepare("select * from manager;");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) 
		{
			return $rows;
		}
  
	}
	
	public function updateProfile()
	{
		$db = db_connect();
		$sql = "UPDATE manager SET name= '".$this->name."', dob = '".$this->dob."',email = '".$this->email."',password = '".$this->password."',
		phone = '".$this->phone."' WHERE managerID= '".$_SESSION['managerID']."'";
		$db->exec($sql);
	}
	
    public function authenticate() 
	{
        /*
         * if username and password good then
         * $this->auth = true;
         */
		 
		$db = db_connect();
        $statement = $db->prepare("select * from manager WHERE email = :email and password = :password;");
        $statement->bindValue(':email', $this->email);
		$pass = md5($this->password);
        $statement->bindValue(':password', $pass);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) {
			$this->auth = true;	
			$_SESSION['managerID'] = $rows[0]['managerID'];
			$_SESSION['name'] = $rows[0]['name'];
			$_SESSION['role'] = 'manager';
		}
    }
	
	public function getStaffMembers()
	{
		$db = db_connect();
        $statement = $db->prepare("select * from staff,province WHERE managerID = :managerID and staff.province = province.pid; ");
        $statement->bindValue(':managerID', $_SESSION['managerID']);
	    $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) 
		{
			return $rows;
		}
	}
	
	public function getFilterStaffMembers($age)
	{
		$db = db_connect();
		if($age == "greater")
		{
        $statement = $db->prepare("select * from staff WHERE managerID = :managerID and YEAR(CURDATE()) - YEAR(dob) >= 30;");
		}
		else
		{
        $statement = $db->prepare("select * from staff WHERE managerID = :managerID and YEAR(CURDATE()) - YEAR(dob) < 30;");
		}
        $statement->bindValue(':managerID', $_SESSION['managerID']);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) 
		{
			return $rows;
		}
	}
}
