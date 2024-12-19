<?php

require_once __DIR__ . '/../vendor/autoload.php';

$routes = require __DIR__ . '/routes/web.php';

// Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (isset($routes[$uri])) {
    [$class, $method] = $routes[$uri];
    (new $class())->$method();
} else {
    http_response_code(404);
    echo "404 - Page not found";
}
