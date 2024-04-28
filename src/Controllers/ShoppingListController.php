<?php
namespace App\Controllers;
session_start();
use App\Controller;
use App\Models\ShoppingList;

class ShoppingListController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['loggedin'])) {
            header('Location: /');
            exit;
        } else {
            $list = new ShoppingList();
            $user_lists = $list->get_by_user_id($_SESSION['id']);
            $this->render('lists', compact('user_lists'));            

        }
    }

    public function signup()
    {
        $user_data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password'])
        );
        $user = new User();
        $inserted_user = $user->save($user_data);
        
    }

    public function login()
    {
        $user_login_data = array(
            'email' => $_POST['email'],
            'password' => md5($_POST['password'])
        );

        $user = new User();
        $user = $user->get_by_login_data($user_login_data);
        
        if ($user) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $user->name;
            $_SESSION['id'] = $user->id;
            setcookie('session_id', session_id() , time()+3600 );
        }
        var_dump($user);
        die();
        
    }    
}