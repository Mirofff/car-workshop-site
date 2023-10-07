<?php
require '../vendor/autoload.php'; // Подключаем библиотеку

use Firebase\JWT\JWT;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


// Создание access токена
function generateAccessToken($user_id) {
    $token_data = [
        "user_id" => $user_id,
        "exp" => time() + 3600 // Время жизни access токена (1 час)
    ];

    return JWT::encode($token_data, $_ENV["SECRET_KEY"], "HS256");
}

// Создание refresh токена
function generateRefreshToken($user_id) {
    $token_data = [
        "user_id" => $user_id,
        "exp" => time() + 86400 * 30 // Время жизни refresh токена (30 дней)
    ];

    return JWT::encode($token_data, $_ENV['SECRET_KEY'], "HS256");
}


// Создаем данные для токена (здесь можно включить информацию о пользователе)
$token_data = [
    "username" => "example_user",
    "exp" => time() + 3600 // Время жизни токена (1 час)
];

$access_token = generateAccessToken(123);
$refresh_token = generateRefreshToken(123);

// Выводим токен (обычно он отправляется клиенту)
echo $access_token;

setcookie("jwt_access_token", $access_token, time() + 3600, "/", "localhost", false, true); // Кука действительна 1 час
setcookie("jwt_refresh_token", $refresh_token, time() + 86400 * 30, "/", "localhost", false, true); // Кука действительна 1 час

echo "успешно!";