<?php

namespace App\Entities;


class Account implements AccountInterface
{
    private $id;
    private $status;

    public function __construct($id, $status)
    {
        $this->id = $id;
        $this->status = $status;
    }


    public function id()
    {
        return $this->id;
    }

    public function isBanned()
    {
        if($this->status != 0) {
            return false;
        }

        return true;
    }

    public function isActive()
    {
        if($this->status != 1) {
            return false;
        }

        return true;
    }
}