<?php

class AuthenticationService
{
    protected ?stdClass $currentUser = null;

    protected Google_Client $googleClient;

    protected static ?AuthenticationService $serviceObject = null;

    private function __construct()
    {
        $this->googleClient = new Google_Client(['client_id' => App::get('config')['google']['CLIENT_ID']]);
    }

    public static function getServiceObject()
    {
        if(is_null(static::$serviceObject)) {
            static::$serviceObject = new AuthenticationService;
        }

        return static::$serviceObject;
    }
    
    public function authenticate(array $attributes = [], ?array $customDomains = []): stdClass
    {
        $idToken = $this->getIdToken($attributes);
        $payload = $this->googleClient->verifyIdToken($idToken);
        
        if($payload === false) {
            throw new AuthenticationException; 
        } elseif(!empty($customDomains) && !in_array($payload['hd'], $customDomains)) {
            throw new AuthenticationException('Unauthorized, check your domain'); 
        }

        $this->saveIdToken($idToken);
        $this->currentUser = $this->getUserFromPayload($payload);
        return $this->currentUser;
    }

    public function logout()
    {
        $this->forgetIdToken();
    }

    public function isAuthenticated(): bool
    {
        return !is_null($this->getCurrentUser());
    }

    public function getCurrentUser(): ?stdClass
    {
        return $this->currentUser;
    }

    protected function getUserFromPayload(array $payload): stdClass
    {
        return (object) [
            'email' => $payload['email'],
            'email_verified' => $payload['email_verified'],
            'name' => $payload['name'],
            'picture' => $payload['picture'],
            'given_name' => $payload['given_name'],
            'family_name' => $payload['family_name'],
            'locale' => $payload['locale'],
        ];
    }

    protected function getIdToken(array $attributes = []): string {
        $idToken = $attributes['google_id_token'] ?? $_POST['google_id_token'] ?? session('google_id_token');
        
        if(is_null($idToken)) {
            throw new AuthenticationException('Unauthorized, no Google ID token is defined');
        }

        return $idToken;
    }

    protected function saveIdToken(string $idToken): void
    {
        session('google_id_token', $idToken);
    }

    protected function forgetIdToken(): void
    {
        session_forget('google_id_token');
    }
}
