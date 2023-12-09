<?php 

namespace Controller;

use Controller\BaseController;
use Controller\AuthController;
use Flight;
use Model\UserModel;
class UserController extends BaseController
{
    private $auth;

    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
        $this->auth = new AuthController();
    }

    public function create()
    {
        echo $this->blade->render('user/create');
    }

    public function store()
    {
        $userData = [
            'usr_usuario' => $_POST['username'],
            'usr_email' => $_POST['email'],
            'usr_senha' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'usr_telefone' => $_POST['tel']
        ];


        $username = $_POST['username'];
        $userEmail = $_POST['email'];
    
        if($this->model->checkCredentials($username, $userEmail)){
            $_SESSION['feedback'] = 'exists';
            Flight::redirect('/login');
        }else {
            $result = $this->model->add($userData);
            if ($result['success']){
                $_SESSION['feedback'] = 'created';
                Flight::redirect('/login');
            } else {
                $_SESSION['feedback'] = 'unexpected';
                Flight::redirect('/register');
            }
        };
    }
    public function profile() 
    {
        echo $this->blade->render('user/profile');
    }
    public function teste() 
    {
        echo $this->blade->render('teste');
    }
}

?>