<?php

namespace Controllers;
use Common\Auth;

use Models\User;
use PDOException;
use DB\Database;
use League\Plates\Engine;

class SignInController
{
    public function index(): void
    {
        $templates = new Engine('Views');

        echo $templates->render('Login');
    }

    public function action(): void
    {
        $user = new User($_POST['user_email']);
        $user->auth($_POST['user_password']);
    }
}
