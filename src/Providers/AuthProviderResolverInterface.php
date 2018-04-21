<?php

namespace App\Providers;


use App\ValueObjects\AuthTypeInterface;

interface AuthProviderResolverInterface
{
    public function resolve(AuthTypeInterface $type, array $providers): AuthProviderInterface;
}