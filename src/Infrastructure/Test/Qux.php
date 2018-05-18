<?php

namespace App\Infrastructure\Test;


class Qux
{
    protected $norf;

    public function __construct(Norf $norf)
    {
        $this->norf = $norf;
    }

    public function out()
    {
        $this->norf->out();
    }
}