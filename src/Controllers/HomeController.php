<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        /*
	$user = new User();
	$user = $user->get_by_id(1);
	
    var_dump(base_url());
	die();
    */
        $this->render('index');
    }

    public function signup()
    {
        $user_data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        );
        
    }

}