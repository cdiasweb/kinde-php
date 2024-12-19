<?php

use App\Controllers\HomeController;

return [
    '/login' => [HomeController::class, 'index'],
    '/about' => [HomeController::class, 'about'],
];
