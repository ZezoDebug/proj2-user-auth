<?php

declare(strict_types=1);

require_once __DIR__ . '/Data/users.php';
require_once __DIR__ . '/Utils/Validator.php';

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $password; 

    public function __construct(int $id, string $name, string $email, string $password) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->setPassword($password);
    }
}