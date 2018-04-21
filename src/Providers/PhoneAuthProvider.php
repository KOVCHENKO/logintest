<?php

namespace App\Providers;


use App\DTO\AuthDTOInterface;
use App\Entities\AccountInterface;

class PhoneAuthProvider extends AuthProvider
{

    public function auth(AuthDTOInterface $dto): AccountInterface
    {
        // TODO: валидация
        return $this->repository()->byPhone($dto->getPhone());
    }
}
