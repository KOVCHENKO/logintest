<?php

namespace App\Providers;


use App\DTO\AuthDTOInterface;
use App\Entities\AccountInterface;

interface AuthProviderInterface
{
    public function auth(AuthDTOInterface $dto): AccountInterface;
}