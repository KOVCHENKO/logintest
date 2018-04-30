<?php

namespace App\Entities;


class Account implements AccountInterface
{

    public function id()
    {
        return 1;
    }

    public function isBanned()
    {
        return false;
    }

    public function isActive()
    {
        return true;
    }
}