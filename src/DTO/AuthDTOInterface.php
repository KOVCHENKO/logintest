<?php

namespace App\DTO;


interface AuthDTOInterface
{
    public function getType();

    public function getPhone();

    public function getMail();

    public function getPassword();
}