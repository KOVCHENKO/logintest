<?php

namespace App\Services\AuthTypes;


interface AuthInterface
{
    public function login($data);

    public function confirmUser($data);

}