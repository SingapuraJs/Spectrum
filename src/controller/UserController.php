<?php 

namespace Controller;

use Controller\BaseController;
use Controller\AuthController;
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

    public function create(){
        echo $this->blade->render('user/create');
    }

    public function store()
    {
        $userData = [
            'usr_usuario' => $_POST('username'),
            'usr_email' => $_POST('email'),
            'usr_senha' => password_hash($_POST('password'), PASSWORD_DEFAULT),
            'usr_telefone' => $_POST('tel')
        ];

        $result = $this->model->create($userData);

        if($result['sucess']){
            \Flight::redirect('/login');
        } else {
            echo 'erro UserController l38';
        }
    }
}

?>