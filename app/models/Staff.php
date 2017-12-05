<?php

class Staff {
	
    public $id;
	public $mid;
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
        $statement = $db->prepare("INSERT INTO staff (managerID,name,email,password,dob,phone,province,city)"
                . " VALUES (:managerID,:name,:email,:password,:dob,:phone,:province,:city); ");

        $statement->bindValue(':managerID', $this->mid);	
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
        $statement = $db->prepare("select * from staff WHERE staffID = :staffID");
        $statement->bindValue(':staffID', $_SESSION['staffID']);
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
		$sql = "UPDATE staff SET name= '".$this->name."', dob = '".$this->dob."',email = '".$this->email."',password = '".$this->password."',
		phone = '".$this->phone."' WHERE staffID= '".$_SESSION['staffID']."'";
		$db->exec($sql);
	}
	
	public function getAllStaffMembers()
	{
		$db = db_connect();
        $statement = $db->prepare("select * from staff;");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) 
		{
			return $rows;
		}
	}
	
	
    public function authenticate() {
        /*
         * if username and password good then
         * $this->auth = true;
         */
		 
		$db = db_connect();
        $statement = $db->prepare("select * from staff WHERE email = :email and password = :password;");
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':password', md5($this->password));
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) {
			$this->auth = true;
			$_SESSION['staffID'] = $rows[0]['staffID'];
			$_SESSION['name'] = $rows[0]['name'];
			$_SESSION['role'] = 'staff';
		}
    }
}
