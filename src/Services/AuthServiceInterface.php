<?php

namespace App\Services;


interface AuthServiceInterface
{
    public function addProvider($type, $provider);
}