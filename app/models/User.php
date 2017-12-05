<?php

class User {

    public $email;
    public $password;
    public $auth = false;

    public function __construct() {
        
    }

    public function authenticate() {
        /*
         * if username and password good then
         * $this->auth = true;
         */
		 
		$db = db_connect();
        $statement = $db->prepare("select * from admin WHERE email = :email and password = :password;");
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':password', md5($this->password));
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) {
			$this->auth = true;
			$_SESSION['name'] = $rows[0]['name'];
			$_SESSION['role'] = 'admin';
		}
    }
}
