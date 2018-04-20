<?php

namespace App\Services\AuthTypes;


use App\Repositories\UserRepository;

class TelegramAuth implements AuthInterface
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function login($data)
    {
        $singleUser = $this->userRepository->getUserByPhoneNumber($data['phone']);

        if($singleUser) {
            $_SESSION['telegram_session'] = '1234';
            $_SESSION['user'] = $singleUser;

            return 'next';
        }

        return false;
    }


    public function confirmUser($data)
    {
        $pinCodeFromSession = $_SESSION['telegram_session'];

        if($data['code'] == $pinCodeFromSession)
        {
            $user = $_SESSION['user'];
            return $user->getId();
        }
    }
}