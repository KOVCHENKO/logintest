<?php

namespace App\Services;


use App\Repositories\AccountRepository;

class Container implements ContainerInterface
{
    public function make($contractName)
    {
        return new $contractName(new AccountRepository());
    }
}