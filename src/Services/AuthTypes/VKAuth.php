<?php

namespace App\Services\AuthTypes;


use App\Repositories\UserRepository;

class VKAuth implements AuthInterface
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
            $_SESSION['vk_session'] = $singleUser->getPhone();
            $_SESSION['user'] = $singleUser;

            return 'next';
        }

        return false;
    }

    public function confirmUser($data)
    {
        $phoneNumberFromSession = $_SESSION['vk_session'];

        if($data['phone'] == $phoneNumberFromSession)
        {
            $user = $_SESSION['user'];
            return $user->getId();
        }

        return false;
    }
}