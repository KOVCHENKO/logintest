<?php

use App\Infrastructure\DI\DependencyInjector;
use App\Infrastructure\Test\Foo;

use App\Controllers\AuthController;
use App\Providers\AuthProviderResolver;
use App\Services\AuthService;
use App\Services\Container;

require 'vendor/autoload.php';

$ioc = new DependencyInjector();

echo "login test";
echo "<br>";

$ioc = new DependencyInjector();

$ioc->bind('foo_injectable', Foo::class);
$injectable = $ioc->make('foo_injectable');

$init = new \App\Infrastructure\Test\Init($injectable);
$init->init();


$loginData = [
    'email' => '123@mail.ru',
    'phone' => '89170863638',
    'password' => 'pass',
    'type' => 'phone'
];

$ioc->bind('auth_service', AuthService::class);
$authInjectable = $ioc->make('auth_service');


//$authController = new AuthController(new AuthService(new AuthProviderResolver(new Container())));
$authController = new AuthController($authInjectable);

try {
    $result = $authController->auth($loginData);
    print_r($result);

} catch (Exception $e) {
    echo $e;
}

?>