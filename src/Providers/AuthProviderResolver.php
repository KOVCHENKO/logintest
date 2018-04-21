<?php

namespace App\Providers;


use App\Services\ContainerInterface;
use App\ValueObjects\AuthTypeInterface;
use Exception;

class AuthProviderResolver implements AuthProviderResolverInterface
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /** @throws */
    public function resolve(AuthTypeInterface $type, array $providers): AuthProviderInterface
    {
        foreach ($providers as $providerType => $providerClass) {
            if (!$type->hasValue($providerType)) {
                continue;
            }
            return $this->container->make($providerClass);
        }

        throw new Exception('Provider not found');
    }
}
