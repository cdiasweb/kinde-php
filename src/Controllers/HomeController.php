<?php


namespace App\Controllers;

use Carlosdias\KindePhp\Auth\KindeAuth;

class HomeController
{
    private $kindeClient = null;
    private $kindeAuth = null;
    public function __construct()
    {
        $this->kindeAuth = new KindeAuth();
        $this->kindeClient = $this->kindeAuth->getKindeClient();
    }

    public function index()
    {
        $this->kindeAuth->goToLoginUrl();
    }

    public function about()
    {
        echo "This is the about page.";
    }
}
