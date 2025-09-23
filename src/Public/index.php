<?php
declare(strict_types=1);

require_once __DIR__ . '/../Data/users.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Services/UserManager.php';
require_once __DIR__ . '/../Utils/Validator.php';

$validator = new Validator();

# Criar instâncias de usuários
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
        echo "Erro ao criar usuário {$userData['name']}: " . $e->getMessage() . PHP_EOL;
    }
}

$userManager = new UserManager($users, $validator);

# CENÁRIOS DE TESTE

# 1. Cadastro válido
$userManager->addUser("Maria Oliveira", "maria@email.com", "Senha123");

# 2. Cadastro com e-mail inválido
$userManager->addUser("Pedro", "pedro@@email", "Senha123");

# 3. Tentativa de login com senha errada
$userManager->login("joao@email.com", "Errada123");

# 4. Reset de senha válido
$userManager->resetPassword(1, "NovaSenha1");

# 5. Cadastro de usuário com e-mail duplicado
$userManager->addUser("João Silva", "joao@email.com", "OutraSenha1");
