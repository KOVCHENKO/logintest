<?php

namespace App\Repositories;


use App\Entities\AccountInterface;

interface AccountRepositoryInterface
{
    public function byEmailAndPassword($email, $password): AccountInterface;

    public function byPhone($phone): AccountInterface;

}