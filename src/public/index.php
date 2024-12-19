<?php


$routes = require __DIR__ . '/../routes/web.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (isset($routes[$uri])) {
    $routes[$uri](); // Call the associated function
} else {
    http_response_code(404);
    echo "404 - Page not found";
}
