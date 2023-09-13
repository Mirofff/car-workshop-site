<?php
require '../vendor/autoload.php'; // Подключаем библиотеку

$dotenv = Dotenv\Dotenv::createImmutable("..");
$dotenv->load();

$SECRETE_KEY = $_ENV['SECRET_KEY'];