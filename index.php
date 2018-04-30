<?php
require 'vendor/autoload.php';

use App\Controllers\AuthController;
use App\Providers\AuthProviderResolver;
use App\Services\AuthService;
use App\Services\Container;


$loginData = [
    'email' => '123@mail.ru',
    'phone' => '89170863638',
    'password' => 'pass',
    'type' => 'email'
];

$authController = new AuthController(new AuthService(new AuthProviderResolver(new Container())));

try {
    $result = $authController->auth($loginData);
    print_r($result);

} catch (Exception $e) {
    echo $e;
}

$telegramConfirmationData = [
    'type' => 'telegram',
    'code' => '1234'
];

$vkConfirmationData = [
    'type' => 'vk',
    'phone' => '89170863638'
];

//print_r($loginController->login($loginData));
//print_r($loginController->confirmUser($telegramConfirmationData));
//print_r($loginController->confirmUser($vkConfirmationData));
?>