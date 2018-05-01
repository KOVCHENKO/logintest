<?php

namespace App\Repositories;


use App\Entities\Account;
use App\Entities\AccountInterface;
use Exception;

class AccountRepository implements AccountRepositoryInterface
{

    public function byEmailAndPassword($email, $password): AccountInterface
    {
        $usersData = $this->getData();

        foreach ($usersData as $singleUser)
        {
            if($singleUser['email'] == $email && $singleUser['password'])
            {
                return new Account($singleUser['id'], $singleUser['status']);
                break;
            }

        }

        throw new Exception('user not found in db');
    }

    public function byPhone($phone): AccountInterface
    {
        $usersData = $this->getData();

        foreach ($usersData as $singleUser)
        {
            if($singleUser['phone'] == $phone)
            {
                return new Account($singleUser['id'], $singleUser['status']);
                break;
            }

        }
        throw new Exception('user not found in db');
    }


    protected function getData()
    {
        return array([
            'id' => 1,
            'email' => '123@mail.ru',
            'phone' => '89170863638',
            'password' => 'pass',
            'status' => 1

        ], [
            'id' => 2,
            'email' => '456@mail.ru',
            'phone' => '8516000314',
            'password' => 'pass',
            'status' => 1
        ], [
            'id' => 3,
            'email' => '789@mail.ru',
            'phone' => '8551278945',
            'password' => 'pass',
            'status' => 1
        ],
            [
                'id' => 4,
                'email' => '555@mail.ru',
                'phone' => '86851234567',
                'password' => 'pass',
                'status' => 1
            ]);

    }
}