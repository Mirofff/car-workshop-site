<?php
namespace Common\Auth;

use Firebase\JWT\JWT;

function generateAccessToken($payload) {
    return JWT::encode($payload, $_ENV['SECRET_KEY'], "HS256");
}

function generateRefreshToken($user_id) {
    $token_data = [
        "user_id" => $user_id,
        "exp" => time() + 86400 * 30 // Время жизни refresh токена (30 дней)
    ];

    return JWT::encode($token_data, $_ENV['SECRET_KEY'], "HS256");
}