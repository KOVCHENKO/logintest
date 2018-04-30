<?php

namespace App\Repositories;


use App\Entities\Account;
use App\Entities\AccountInterface;

class AccountRepository implements AccountRepositoryInterface
{

    public function byEmailAndPassword($email, $password): AccountInterface
    {
        return new Account();
    }

    public function byPhone($phone): AccountInterface
    {
        // TODO: Implement byPhone() method.
    }
}