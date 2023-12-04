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

    public function store($userData)
    {
        $result = $this->model->add($userData);
        return $result;
    }
}

?>