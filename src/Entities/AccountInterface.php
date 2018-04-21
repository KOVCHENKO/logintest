<?php

namespace App\Entities;


interface AccountInterface
{
    public function id();

    public function isBanned();

    public function isActive();
}