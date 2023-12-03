<?php 
namespace Controller;

class HomeController extends BaseController
{
    public function index()
    {
        return $this->blade->render('home');
    }
}

?>