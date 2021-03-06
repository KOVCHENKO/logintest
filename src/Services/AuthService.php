<?php

namespace App\Services;

use App\DTO\AuthDTOInterface;
use App\Entities\AccountInterface;
use App\Providers\AuthProvider;
use App\Providers\AuthProviderInterface;
use App\Providers\AuthProviderResolverInterface;
use Exception;

class AuthService implements AuthServiceInterface
{


    protected $providers = [];
    protected $resolver;

    public function __construct(AuthProviderResolverInterface $resolver)
    {
        $this->resolver = $resolver;
    }

    public function auth(AuthDTOInterface $dto): AccountInterface
    {
        $type = $dto->getType();
        $provider = $this->resolver->resolve($type, $this->providers);

        return $provider->auth($dto);
    }

    /** @throws */
    public function addProvider($type, $provider)
    {
        $this->providers[$type] = $provider;
    }
}