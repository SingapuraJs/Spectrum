<?php 

namespace Controller;

use Controller\BaseController;
use Model\UserModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
    }

    public function login()
    {
        echo $this->blade->render('User/login');
    }

    public function auth()
    {
        $userData = $this->model->verifyExist($_POST['username'] ,$_POST['email']);
        if(password_verify($_POST['password'],$userData['usr_senha'])){
            
            $id_session = session_id();
            session_write_close();

            session_start();

            $_SESSION['authenticated'] = true;
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['browser'] = $_SERVER["HTTP_USER_AGENT"];
            $_SESSION['user'] = [
                'id' => $userData['id_usuario'],
                'name' => $userData['usr_usuario'],
                'email' => $userData['usr_email']
            ];

            \Flight::redirect('/home');

        }

        
    }

    public function verifyAuthenticated()
    {
        if(array_key_exists('authenticated', $_SESSION) 
        && array_key_exists('ip', $_SESSION) 
        && array_key_exists('browser',$_SESSION) 
        && array_key_exists('user', $_SESSION)) {
            return ( $_SESSION['authenticated'] ) 
            && ( $_SESSION['ip'] === $_SERVER['REMOTE_ADDR'] ) 
            && ( $_SESSION['browser'] === $_SERVER["HTTP_USER_AGENT"] );
        } else {
            return false;
        }
    }


}
?>