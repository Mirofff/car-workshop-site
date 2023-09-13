<?php
require '../../vendor/autoload.php'; // Подключаем библиотеку

use Firebase\JWT\JWT;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo $_POST["user_email"];

function generateAccessToken($user_id) {
    $token_data = [
        "user_id" => $user_id,
        "user_email" => $_POST["user_email"],
        "exp" => time() + 3600
    ];

    return JWT::encode($token_data, $_ENV["SECRET_KEY"], "HS256");
}

$access_token = generateAccessToken(123);
setcookie("jwt_access_token", $access_token, time() + 3600, "/", "localhost", false, true); // Кука действительна 1 час

header("Location: /src/check-cookie.php");
