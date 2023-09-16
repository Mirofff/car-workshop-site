<?php

namespace Controllers;

use League\Plates\Engine;

class HomeController
{
    private $templates;

    public function __construct()
    {
        $this->templates = new Engine('Views');
    }

    public function index()
    {
        echo $this->templates->render('Home');
    }

    public function logout()
    {
        $this->templates->render('Logout');
    }

    public function logout_action()
    {
        setcookie("access_token", "", time() - 3600, "/");
        header('Location: /');
    }
}