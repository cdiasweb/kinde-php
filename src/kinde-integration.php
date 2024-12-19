<?php

use Carlosdias\KindePhp\Auth\KindeAuth;

require_once(__DIR__ . "/../vendor/autoload.php");

$kindeAuth = new KindeAuth();
$kindeClient = $kindeAuth->getKindeClient();

