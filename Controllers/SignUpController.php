<?php

namespace Controllers;

use PDOException;
use DB\Database;
use League\Plates\Engine;
use Models\User;
use Common\Auth;

class SignUpController
{
    public function index()
    {
        $templates = new Engine('Views');

        echo $templates->render('Registration');
    }

    public function action()
    {
        $user = new User(
            $_POST['user_email'],
            $_POST['user_password'],
        );

        $user->addInfo($_POST['user_first_name'], $_POST['user_second_name'], $_POST['user_last_name']);

        if ($user->isExist()) {
            header('Location: /');
            exit();
        };

        $user->save();

        $paylod = [
        "id" => $user->getId(),
        "first_name" => $_POST["user_first_name"],
        "last_name" => $_POST["user_last_name"],
        "exp" => time() + 3600 // Время жизни access токена (1 час)
        ];

        $access = Auth\generateAccessToken($paylod);

        setcookie("access_token", $access, time() + 3600, "/");
        header('Location: /');
        exit();
    }
}
