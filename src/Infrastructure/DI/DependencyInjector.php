<?php

namespace App\patterns\DI;


class DependencyInjector
{
    protected $services = [];

    public function __construct()
    {
    }

    public function bind($service_name, callable $callable)
    {
        // Check if the service exists
        if (array_key_exists($this->services, $service_name)) {
            throw new \Exception("The service: ".$service_name."already exists.");
        }

        $this->services[$service_name] = $callable;
    }

    public function make($service_name)
    {
        // Check if the service exists
        if (!array_key_exists($this->services, $service_name)) {
            throw new \Exception("The service: ".$service_name."does not exist.");
        }

        // Return the existing service
        return $this->services[$service_name];
    }
}

$config = [
    'aws' => [
        'key' => '123',
        'private_key' => 'abc'
    ],
    'db' => [
        'user' => '_ilkov_',
        'password' => '_pass_'
    ]
];


// This would be defined all in services.php
$di = new DependencyInjector();
$di->bind('aws', function() use ($config) {
   $obj = new stdClass();
   $obj->name = 'aws';
   $obj->key = $config['aws']['key'];
   $obj->private_key = $config['aws']['private_key'];

   return $obj;
});

$di->bind('database', function() use ($config) {
    $obj = new stdClass();
    $obj->name = 'database';
    $obj->user = $config['db']['user'];
    $obj->password = $config['db']['password'];
    return $obj;
});

// This should be called where it is needed
$db = $di->make('database');
$aws = $di->make('aws');

