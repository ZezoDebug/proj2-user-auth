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
        if (empty($password)){
            return false;
        } elseif (strlen($password) < 8 ) {
            return false;
        } elseif (!preg_match('/[A-Z]/', $password)) {
            return false;
        } elseif (!preg_match('/[a-z]/', $password)) {
            return false;
        } elseif (!preg_match('/[0-9]/', $password)) {
            return false;
        } else {
            return true;
        }
    }
}           