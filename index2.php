<?php

require 'vendor/autoload.php';
session_start();

use App\Controllers\LoginController;
use App\Storage\LocalDataStorage;
use App\Entities\User;
use App\Repositories\UserRepository;
use App\Services\AuthTypes\AuthTypeSelector;
use App\Services\AuthTypes\EmailAuth;
use App\Services\AuthTypes\TelegramAuth;
use App\Services\AuthTypes\VKAuth;
use App\Services\LoginService;

$loginController = new LoginController(
    new LoginService(
        new AuthTypeSelector(
            new EmailAuth(new UserRepository(new User(), new LocalDataStorage())),
            new TelegramAuth(new UserRepository(new User(), new LocalDataStorage())),
            new VKAuth(new UserRepository(new User(), new LocalDataStorage())))));

$loginData = [
    'email' => '123@mail.ru',
    'phone' => '89170863638',
    'password' => 'pass',
    'type' => 'vk'
];

$telegramConfirmationData = [
    'type' => 'telegram',
    'code' => '1234'
];

$vkConfirmationData = [
    'type' => 'vk',
    'phone' => '89170863638'
];

print_r($loginController->login($loginData));
//print_r($loginController->confirmUser($telegramConfirmationData));
//print_r($loginController->confirmUser($vkConfirmationData));
?>