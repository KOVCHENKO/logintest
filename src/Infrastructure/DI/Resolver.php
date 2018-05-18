<?php

namespace App\Infrastructure\DI;


class Resolver
{

    private $binds = [];

    public function bind($name, $class)
    {
        return $this->binds[$name] = $this->instantiate($class);
    }


    private function checkIfInstantiable($reflector, $class)
    {
        if (!$reflector->isInstantiable()) {
            throw new \Exception($class . " is not instantiable");
        }
    }

    private function instantiate($class)
    {
        $reflector = new \ReflectionClass($class);

        $this->checkIfInstantiable($reflector, $class);

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return new $class;
        }

        $parameters = $constructor->getParameters();
        $dependencies = $this->getDependencies($parameters);



        return $reflector->newInstanceArgs($dependencies);
    }

    private function getDependencies($parameters)
    {

        $dependencies = array();

        foreach ($parameters as $parameter) {
            $dependency = $parameter->getClass();

            if($dependency->isInterface()) {
                $dependencies[] = $dependency->getName();
                continue;
            }

            if (is_null($dependency)) {
                $dependencies[] = $this->resolveNonClass($parameter);
            } else {
                $dependencies[] = $this->instantiate($dependency->name);
            }
        }


        return $dependencies;
    }


    public function make($name)
    {
        foreach ($this->binds as $bindName => $singleBind) {
            if ($bindName == $name) {
                return $singleBind;
            }
        }

        throw new \Exception($name . " has not bind yet");
    }


}