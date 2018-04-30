<?php

namespace App\Controllers;


use App\DTO\AuthDTO;
use App\Providers\MailAuthProvider;
use App\Providers\PhoneAuthProvider;
use App\Repositories\AccountRepository;
use App\Services\AuthServiceInterface;

class AuthController
{
    /** @var AuthServiceInterface */
    protected $authService;

    /**
     * AuthController constructor.
     * @param AuthServiceInterface $authService
     */
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function auth(array $data)
    {
        $this->authService->addProvider('email', MailAuthProvider::class);
        $this->authService->addProvider('phone', PhoneAuthProvider::class);

        return $this->authService->auth(
            AuthDTO::makeFromArray($data)
        );
    }
}