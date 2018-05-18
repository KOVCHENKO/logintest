<?php

use App\Infrastructure\DI\Resolver;
use App\Infrastructure\Test\Foo;

use App\Controllers\AuthController;
use App\Providers\AuthProviderResolver;
use App\Services\AuthService;
use App\Services\Container;

require 'vendor/autoload.php';

$resolver = new Resolver();

echo "login test";
echo "<br>";

$resolver = new Resolver();

$resolver->bind('foo_injectable', Foo::class);
$injectable = $resolver->make('foo_injectable');

$init = new \App\Infrastructure\Test\Init($injectable);
$init->init();


$loginData = [
    'email' => '123@mail.ru',
    'phone' => '89170863638',
    'password' => 'pass',
    'type' => 'phone'
];

$resolver->bind('auth_service', AuthService::class);
$authInjectable = $resolver->make('auth_service');


//$authController = new AuthController(new AuthService(new AuthProviderResolver(new Container())));
$authController = new AuthController($authInjectable);

try {
    $result = $authController->auth($loginData);
    print_r($result);

} catch (Exception $e) {
    echo $e;
}

?>