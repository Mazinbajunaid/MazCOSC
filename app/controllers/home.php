<?php

class Home extends Controller {


    public function index($name = '') {		
        $user = $this->model('User');
		
		if (strtolower($_SESSION['name']) == 'mike') {
			$message = 'You are awesome';
		} else {
			$message = 'You suck';
		}
		
        $this->view('home/index', ['message' => $message]);
    }

    public function login($name = '') 
	{
        $this->view('home/login');
    }

	public function phonebook()
	{	
		$pb = $this->model('Phonebook');
        $list = $pb->getPhoneList();
        $this->view('home/phonebook', ['book' => $list]);
   
	}
	
	
	public function filterPhonebook()
	{	
	  if (isset($_POST['pname'])) {
            $pname = $_POST['pname'];
        }
		$pb = $this->model('Phonebook');
        $list = $pb->getFilterPhoneList($pname);
        $this->view('home/phonebook', ['book' => $list]);
   
	}
	

	public function createStaff()
	{	
		$this->view('home/createstaff');
	}
	
	public function createManager()
	{
		$pb = $this->model('Province');
		$list = $pb->getProvinceList();
		$this->view('home/createmanager',['province' => $list]);
	}
	
	public function cityList($id)
	{
		$pb = $this->model('City');
		$list = $pb->getCityList($id);
		echo json_encode($list);
	}
	
	public function addManager()
	{
		$manager = $this->model('Manager');

        if (isset($_POST['name'])) {
            $manager->name = $_POST['name'];
        }

        if (isset($_POST['password'])) {
            $manager->password = $_POST['password'];
        }
		
        if (isset($_POST['email'])) {
            $manager->email = $_POST['email'];
        }
		
        if (isset($_POST['dob'])) {
            $manager->dob = $_POST['dob'];
        }
		
        if (isset($_POST['phone'])) {
            $manager->phone = $_POST['phone'];
        }
		
		 if (isset($_POST['province'])) {
            $manager->province = $_POST['province'];
        }
		
        if (isset($_POST['city'])) {
            $manager->city = $_POST['city'];
        }
		
		$manager->insert();
		
		header('Location: /home/createManager');
	}
	
	
	public function addStaff()
	{
		$member = $this->model('Staff');

        if (isset($_POST['mid'])) {
            $member->mid = $_POST['mid'];
        }
		
        if (isset($_POST['name'])) {
            $member->name = $_POST['name'];
        }

        if (isset($_POST['password'])) {
            $member->password = $_POST['password'];
        }
		
        if (isset($_POST['email'])) {
            $member->email = $_POST['email'];
        }
		
        if (isset($_POST['dob'])) {
            $member->dob = $_POST['dob'];
        }
		
        if (isset($_POST['phone'])) {
            $member->phone = $_POST['phone'];
        }
			
		 if (isset($_POST['province'])) {
            $member->province = $_POST['province'];
        }
		
        if (isset($_POST['city'])) {
            $member->city = $_POST['city'];
        }
		$member->insert();
		
		header('Location: /home/createStaff');
	}
	public function getAllManagers()
	{
		$manager = $this->model('Manager');
		return $manager->getAllManagers();
	}
}
