<?php

namespace App\Repositories;

use App\Storage\LocalDataStorage;
use App\Entities\User;

class UserRepository
{
    private $user;
    private $dataStorage;

    public function __construct(User $user, LocalDataStorage $dataStorage)
    {
        $this->user = $user;
        $this->dataStorage = $dataStorage;
    }


    public function getUserByEmail($email)
    {
        $usersData = $this->dataStorage->getData();

        foreach ($usersData as $singleUser)
        {
            if($singleUser['email'] == $email)
            {
                $this->user->setId($singleUser['id']);
                $this->user->setEmail($singleUser['email']);
                $this->user->setPassword($singleUser['password']);
                $this->user->setPhone($singleUser['phone']);

                break;
            }

        }
        return $this->user;
    }

    public function getUserByPhoneNumber($phone)
    {
        $usersData = $this->dataStorage->getData();

        foreach ($usersData as $singleUser)
        {
            if($singleUser['phone'] == $phone)
            {
                $this->user->setId($singleUser['id']);
                $this->user->setEmail($singleUser['email']);
                $this->user->setPassword($singleUser['password']);
                $this->user->setPhone($singleUser['phone']);

                break;
            }

        }
        return $this->user;
    }

}