<?php

namespace App\Storage;

class LocalDataStorage
{
    public function getData()
    {
        return array([
            'id' => 1,
            'email' => '123@mail.ru',
            'phone' => '89170863638',
            'password' => 'pass',

        ], [
            'id' => 2,
            'email' => '456@mail.ru',
            'phone' => '8516000314',
            'password' => 'pass'
        ], [
            'id' => 3,
            'email' => '789@mail.ru',
            'phone' => '8551278945',
            'password' => 'pass'
        ],
            [
                'id' => 4,
                'email' => '555@mail.ru',
                'phone' => '86851234567',
                'password' => 'pass'
            ]);

    }
}