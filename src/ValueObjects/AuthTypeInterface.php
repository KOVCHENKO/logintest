<?php

namespace App\ValueObjects;


interface AuthTypeInterface
{
    public function value();

    public function hasValue($value);
}