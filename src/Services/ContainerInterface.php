<?php

namespace App\Services;


interface ContainerInterface
{
    public function make($contractName);
}