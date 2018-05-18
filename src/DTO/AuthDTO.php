<?php

namespace App\DTO;


use App\ValueObjects\AuthType;
use App\ValueObjects\AuthTypeInterface;

class AuthDTO implements AuthDTOInterface
{
    private $type;
    private $phone;
    private $email;
    private $password;

    /**
     * AuthDTO constructor.
     * @param $type
     * @param $phone
     * @param $email
     * @param $password
     */
    public function __construct(AuthType $type, $phone, $email, $password)
    {
        $this->type = $type;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
    }

    public static function makeFromArray(array $data): self
    {
        $type = $data['type'];
        $phone = $data['phone'];
        $email = $data['email'];
        $password = $data['password'];

        return new AuthDTO(new AuthType($type), $phone, $email, $password);
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getMail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
