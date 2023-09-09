<?php
require '../vendor/autoload.php'; // Подключаем библиотеку

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Проверяем, есть ли кука с именем "jwt_access_token"
if (isset($_COOKIE['jwt_access_token'])) {
    echo $_COOKIE['jwt_access_token'];
    echo $_COOKIE['jwt_refresh_token'];
    // Получаем значение куки
    $token = $_COOKIE['jwt_access_token'];

    try {
        // Попытка декодировать и проверить токен
        $decoded_token = JWT::decode($token, new Key($_ENV['SECRET_KEY'], "HS256"));

        // Токен декодирован успешно
        $user_id = $decoded_token->user_id;
        $username = $decoded_token->username;
        $useremial = $decoded_token->user_email;

        // Далее вы можете использовать данные из токена для аутентификации и авторизации
        echo "User ID: $user_id<br>";
        echo "Username: $username<br>";
        echo "Usermail: $useremial<br>";
    } catch (Exception $e) {
        // Обработка ошибки при недействительном токене
        http_response_code(401); // Неавторизованный доступ
        echo "Access denied. Error: " . $e->getMessage();
    }
} else {
    echo "Редирект...";
    header("Location: login.php");
}
