<?php

namespace Carlosdias\KindePhp\Auth;

use Kinde\KindeSDK\Configuration;
use Kinde\KindeSDK\KindeClientSDK;

class KindeAuth
{
    private $kindeClient;
    private $kindeConfig;

    private $domain = "https://carlosdias.kinde.com";
    private $clientId;
    private $redirectUri = "http://localhost:8000/callback";
    private $clientSecret;
    private $scopes = "openid profile email";

    public function __construct()
    {
        $this->clientId = $_ENV['KINDE_CLIENT_ID'];
        $this->clientSecret = $_ENV['KINDE_CLIENT_SECRET'];

        $this->kindeClient = new KindeClientSDK(
            $this->domain,
            $this->redirectUri,
            $this->clientId,
            $this->clientSecret,
            "client_credentials",
            "http://localhost:8000",
            $this->scopes
        );
        $this->kindeConfig = new Configuration();
        $this->kindeConfig->setHost("https://carlosdias.kinde.com");
    }

    public function getKindeClient()
    {
        return $this->kindeClient;
    }

    public function goToLoginUrl()
    {
        $domain = $this->domain;
        $clientId = $this->clientId;
        $redirectUri = urlencode($this->redirectUri);
        $scopes = urlencode($this->scopes);
        $responseType = 'code';
        $state = bin2hex(random_bytes(32));
        $loginUrl = "$domain/oauth2/auth?response_type=$responseType&client_id=$clientId&redirect_uri=$redirectUri&scope=$scopes&state=$state";

        header("Location: $loginUrl");
        exit();
    }
}
