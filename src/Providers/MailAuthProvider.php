<?php

namespace App\Providers;


use App\DTO\AuthDTOInterface;
use App\Entities\AccountInterface;

class MailAuthProvider extends AuthProvider
{

    public function auth(AuthDTOInterface $dto): AccountInterface
    {
        // TODO: валидация
        return $this->repository()->byEmailAndPassword($dto->getMail(), $dto->getPassword());
    }
}
