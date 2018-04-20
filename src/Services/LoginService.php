<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\AuthTypes\AuthTypeSelector;

class LoginService
{
    private $authTypeSelector;

    public function __construct(AuthTypeSelector $authTypeSelector)
    {
        $this->authTypeSelector = $authTypeSelector;
    }

    public function login($data)
    {
        $authType = $this->authTypeSelector->chooseAuthType($data['type']);

        return $authType->login($data);
    }

    public function confirmUser($data)
    {
        $authType = $this->authTypeSelector->chooseAuthType($data['type']);

        return $authType->confirmUser($data);
    }
}