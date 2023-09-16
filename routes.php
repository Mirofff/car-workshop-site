<?php

use FastRoute\RouteCollector;

function dadadada() {
    var_dump($_POST);
}


$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', 'Controllers\HomeController@index');
    $r->addRoute('GET', '/signup', 'Controllers\SignUpController@index');
    $r->addRoute('POST', '/signup-action', 'Controllers\SignUpController@action');
    $r->addRoute("GET", "/signin", 'Controllers\SignInController@index');
    $r->addRoute("POST", "/signin-action", 'Controllers\SignInController@action');
    $r->addRoute("GET", "/logout-action", 'Controllers\HomeController@logout_action');
    // Другие маршруты и обработчики
});

