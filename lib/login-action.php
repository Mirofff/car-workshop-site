<?php

require "db/common.php";
require "auth/common.php";

$data = ["email" => $_POST['email']];


$response = $db->select("user", "id, email, password", 'email = ":email"', data: $data);

var_dump($_POST);
var_dump($response);

if (isset($response['password']) and (password_verify($_POST['password'], $response['password']))) {
    $access = generateAccessToken($response['id']);
    setcookie("access_token", $access, time() + 3600, "/");
    header('Location: /');
} else {
    ;
}