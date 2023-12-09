<?php

namespace Controller;
use Jenssegers\Blade\Blade;

class BaseController
{
    public $blade;
    public $model;
    public function __construct()
    {
        $this->blade = new Blade('src/view', 'cache');
    }
}