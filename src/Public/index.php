<?php

declare (strict_types=1);

require_once __DIR__ . '/../Data/users.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Services/UserManager.php';
require_once __DIR__ . '/../Utils/Validator.php';


$validator = new Validator();


$users = [];
foreach ($usuarios as $userData){
    try {
        $users[] = new User(
            $userData['id'],
            $userData['name'],
            $userData['email'],
            $userData['password'],
            $validator
        );
    } catch (Exception $e) {
        echo "Erro ao criar usuário {$userData['name']}: " . $e->getMessage() .PHP_EOL;
    }
}

$userManager = new UserManager($users, $validator);