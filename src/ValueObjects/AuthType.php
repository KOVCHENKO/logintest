<?php

namespace App\ValueObjects;


class AuthType implements AuthTypeInterface
{
    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }


    public function value()
    {
        return $this->type;
    }

    public function hasValue($value)
    {
        if($value == $this->type) {
            return true;
        }

        return false;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}