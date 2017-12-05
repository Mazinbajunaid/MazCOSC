<?php

class PhonebookController extends Controller 
{
    public function getPhoneList() 
	{
        $pb = $this->model('Phonebook');
        $list = $pb->getPhoneList();
        $this->view('home/phonebook', ['book' => $list]);
    }
	
}