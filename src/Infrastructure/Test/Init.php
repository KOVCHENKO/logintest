<?php

namespace App\Infrastructure\Test;


class Init
{
    protected $foo;

    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    public function init()
    {
        $this->foo->out();
    }
}