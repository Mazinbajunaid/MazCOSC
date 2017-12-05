<?php

class ManagerHome extends Controller 
{
    public function index() 
	{		
        $user = $this->model('Manager');
		$profile = $user->getProfile();
        $this->view('manager/index', ['name' => $profile[0]['name'],
		'email' => $profile[0]['email'], 'dob' => $profile[0]['dob'],
		'phone' => $profile[0]['phone']]);
		
    }
	public function updateProfile()
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
		
		$manager->updateProfile();
		
		header('Location: /managerhome/index');
	}
	
	public function staffMembers()
	{
		$manager = $this->model('Manager');
		$members = $manager->getStaffMembers();
        $this->view('manager/staffmembers', ['members' => $members]);
		
	}
	public function filterMembers()
	{
		$age = null;
		if (isset($_POST['age'])) {
            $age = $_POST['age'];
        }
		
		$manager = $this->model('Manager');
		$members = $manager->getFilterStaffMembers($age);
        $this->view('manager/staffmembers', ['members' => $members]);
		
	}
}