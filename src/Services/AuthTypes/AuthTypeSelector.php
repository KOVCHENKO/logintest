<?php
/**
 * Created by PhpStorm.
 * User: il_kow
 * Date: 4/20/18
 * Time: 9:56 AM
 */

namespace App\Services\AuthTypes;


class AuthTypeSelector
{
    private $emailAuth;
    private $telegramAuth;
    private $vkAuth;

    public function __construct(EmailAuth $emailAuth, TelegramAuth $telegramAuth, VKAuth $vkAuth)
    {
        $this->emailAuth = $emailAuth;
        $this->telegramAuth = $telegramAuth;
        $this->vkAuth = $vkAuth;
    }

    public function chooseAuthType($authType)
    {
        switch ($authType) {
            case "email":
                return $this->emailAuth;
                break;
            case "vk":
                return $this->vkAuth;
                break;
            case "telegram":
                return $this->telegramAuth;
                break;
        }
    }
}