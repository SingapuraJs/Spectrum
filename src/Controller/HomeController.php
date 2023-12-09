<?php 
namespace Controller;
use Controller\BaseController;
class HomeController extends BaseController
{
    public function index()
    {
        return $this->blade->render('home');
    }
    public function about()
    {
        return $this->blade->render('about');
    }
}

?>