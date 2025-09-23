<?php

declare(strict_types=1);

class Validator
{
    # Validação do Email
    public function isValidEmail(string $email): bool
    {
        if (empty($email)){
            return false;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        } else {
            return true;
        }
    }

    # Validação da Senha
    public function isStrongPassword(string $password): bool
    {
        if (empty($password) || strlen($password) < 8) {
            return false;
        }
        if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
            return false;
        }
        return true;
    }
}           