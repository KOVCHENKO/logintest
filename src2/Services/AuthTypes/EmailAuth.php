<?php

namespace App\Services\AuthTypes;


use App\Repositories\UserRepository;

class EmailAuth implements AuthInterface
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($data)
    {
        $singleUser = $this->userRepository->getUserByEmail($data['email']);

        if($data['email'] == $singleUser->getEmail() && $data['password'] == $singleUser->getPassword())
        {
            return $singleUser->getId();
        }

        return false;
    }

    public function confirmUser($data)
    {
        // TODO: Implement confirmByPin() method.
    }
}