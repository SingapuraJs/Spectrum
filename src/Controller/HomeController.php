<?php 
namespace Controller;
use Controller\BaseController;
class HomeController extends BaseController
{
    public function index()
    {
        return $this->blade->render('home');
    }
}

?>