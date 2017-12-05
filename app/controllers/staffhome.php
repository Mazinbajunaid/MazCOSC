<?php

class StaffHome extends Controller 
{
    public function index() 
	{		
        $user = $this->model('Staff');
		$profile = $user->getProfile();
        $this->view('staff/index', ['name' => $profile[0]['name'], 'email' => $profile[0]['email'], 'dob' => $profile[0]['dob'],
		'phone' => $profile[0]['phone']]);
		
		
    }
	public function updateProfile()
	{
		$manager = $this->model('Staff');

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
		
		header('Location: /staffhome/index');
	}
}