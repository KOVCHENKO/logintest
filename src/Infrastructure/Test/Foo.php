<?php

namespace App\Infrastructure\Test;


class Foo
{
    protected $bar;
    protected $baz;

    public function __construct(Bar $bar, Baz $baz)
    {
        $this->bar = $bar;
        $this->baz = $baz;
    }

    public function out()
    {
        $this->baz->out();
    }
}