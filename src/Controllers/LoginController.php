<?php
/**
 * Created by PhpStorm.
 * User: il_kow
 * Date: 4/20/18
 * Time: 9:40 AM
 */

namespace App\Controllers;

use App\Services\LoginService;

class LoginController
{
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login($request)
    {
        return $this->loginService->login($request);
    }

    public function confirmUser($request)
    {
        return $this->loginService->confirmUser($request);
    }
}