<?php

namespace App\DTO;


class AuthDTO implements AuthDTOInterface
{
    public static function makeFromArray(array $data): self
    {
        /** TODO: Создать DTO */
        return new AuthDTO;
    }

    public function getType()
    {
        // TODO: Implement getType() method.
    }

    public function getPhone()
    {
        // TODO: Implement getPhone() method.
    }

    public function getMail()
    {
        // TODO: Implement getMail() method.
    }

    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }
}
