<?php

class Login extends Controller {
    public function index() 
	{
		$role = null;
		$email = null;
		$password = null;
		
        if (isset($_POST['role'])) {
            $role = $_POST['role'];
        }
		
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }

        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }
		
		if($role == "Admin")
		{
			
		$user = $this->model('User');
		$user->email = $email;
		$user->password = $password;

        $user->authenticate();
        if ($user->auth == TRUE) 
		{
            $_SESSION['auth'] = true;
        }
        header('Location: /home');
		}
		
		else if($role == "Manager")
		{
			
		$user = $this->model('Manager');
		$user->email = $email;
		$user->password = $password;

        $user->authenticate();
        if ($user->auth == TRUE) 
		{
            $_SESSION['auth'] = true;
        }
        header('Location: /managerhome');
		}
		
		else if($role == "Staff")
		{
			
		$user = $this->model('Staff');
		$user->email = $email;
		$user->password = $password;

        $user->authenticate();
        if ($user->auth == TRUE) 
		{
            $_SESSION['auth'] = true;
        }
        header('Location: /staffhome');
		
		}
    }
	
	
	public function register () {
		$user = $this->model('User');
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$user->register($email, $password);
			$_SESSION['auth'] = true;
		}
		
		$this->view('home/register');
	}
}
