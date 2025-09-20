<?php

declare(strict_types=1);

require_once __DIR__ . '/../Utils/Validator.php';
require_once __DIR__ . '/../Models/User.php';

class UserManager
{
    private array $users;
    private Validator $validator;

    public function __construct(array $users, Validator $validator)
    {
        $this->user = $users;
        $this->validator = $validator;
    }
}