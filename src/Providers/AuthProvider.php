<?php

namespace App\Providers;


use App\Repositories\AccountRepositoryInterface;

abstract class AuthProvider implements AuthProviderInterface
{
    protected $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function repository(): AccountRepositoryInterface
    {
        return $this->accountRepository;
    }
}
