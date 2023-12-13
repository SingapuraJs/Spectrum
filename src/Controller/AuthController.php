<?php 

namespace Controller;

use Controller\BaseController;
use Flight;
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
        return $this->blade->render('user/login');
    }

    public function auth()
    {
        if(strlen($_POST['password']) < 6) {
            $_SESSION['feedback'] = 'unexpected';
            Flight::redirect('/login');
            exit;
        }

        $userData = $this->model->getExistent($_POST['username']);
        if($userData !== false) {

            if(password_verify($_POST['password'], $userData['usr_senha'])){
                
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
        } else {
            $_SESSION['feedback'] = 'incorrect';
            \Flight::redirect('/login');

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

    public function logout()
    {
        if(isset($_SESSION['authenticated']) && ($_SESSION['authenticated'])){
            session_unset();
            session_destroy();
            session_commit();
            Flight::redirect('/home');
            return ['success' => true];
        } else {

            return ['success' => false];
        }
    }

    public function redirect(){
        
        session_regenerate_id();
        $_SESSION = array();
        $_SESSION['feedback'] = 'expired';
        Flight::redirect('/home');

    }
}
?>