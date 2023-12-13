<?php 
namespace Controller;

use Controller\BaseController;
use Model\PostModel;

class PostController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new PostModel();
    }

    public function doPost()
    {
        $postData = [
            'img' => $_POST['img'],
            'desc' => $_POST['desc'],
            'id' => $_SESSION['user']['id']
        ];

        $result = $this->model->make($postData);
        
    }
}

?>