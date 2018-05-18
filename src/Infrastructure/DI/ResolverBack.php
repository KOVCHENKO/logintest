<?php

namespace App\Infrastructure\DI;


class ResolverBack
{
    public function bind($class)
    {
        $reflector = new \ReflectionClass($class);

        if (!$reflector->isInstantiable()) {
            throw new \Exception($class . " is not instantiable");
        }

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return new $class;
        }

        $parameters = $constructor->getParameters();

        $dependencies = array();

        foreach ($parameters as $parameter) {
            $dependency = $parameter->getClass();

            if (is_null($dependency)) {
                if ($parameter->isDefaultValueAvailable()) {
                    $dependencies[] = $parameter->getDefaultValue();
                }

                throw new \Exception("Can't resolve the unknown");
            } else {
                $dependencies[] = $this->bind($dependency->name);
            }
        }

        return $reflector->newInstanceArgs($dependencies);
    }

    public function make()
    {

    }




}