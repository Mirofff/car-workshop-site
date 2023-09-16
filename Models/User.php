<?php

namespace Models;

use Common\Auth;
use DB\Database;

class User
{
    private $id;
    private $first_name;
    private $second_name;
    private $last_name;
    private $email;
    private $password;

    private $pdo;

    public function __construct($email)
    {
        $this->password =
        $this->email = $email;

        $this->pdo = Database::getInstance();
    }

    public function addInfo($first_name, $second_name, $last_name)
    {
        $this->first_name = $first_name;
        $this->second_name = $second_name;
        $this->last_name = $last_name;
    }

    public function auth($password): void
    {
        $resp = $this->pdo->select('user', "*", "email = :email", ["email" => $this->email]);
        if (isset($resp)) {
            $user_data = $resp[0];
            if (password_verify($password, $user_data['password'])) {
                $access = Auth\generateAccessToken(["name" => $user_data['first_name'], "surname" => $user_data['last_name'], "id" => $user_data['id']]);
                setcookie("access_token", $access, time() + 3600, "/");
                header("Location: /");
            }
        }
    }

    public function save($password): void
    {
        $this->pdo->insert(
            "user",
            [
                "id" => hexdec(uniqid()),
                "first_name" => $this->first_name,
                "second_name" => $this->second_name,
                "last_name" => $this->last_name,
                "password" => password_hash($password, PASSWORD_DEFAULT),
                "email" => $this->email,
            ]
        );
    }

    public function isExist(): bool
    {
        $response = $this->pdo->select("user", "email", "email = :email", ['email' => $this->email]);
        if (isset($response)) {
            if (isset($response['email'])) {
                return true;
            }
        }
        return false;
    }

    public function getId()
    {
        return $this->id;
    }
}
