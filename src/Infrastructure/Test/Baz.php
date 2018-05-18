<?php

namespace App\Infrastructure\Test;


class Baz
{
    protected $qux;

    public function __construct(Qux $qux)
    {
        $this->qux = $qux;
    }

    public function out()
    {
        $this->qux->out();
    }
}