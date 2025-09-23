<?php

declare(strict_types=1);

require_once __DIR__ . '/../Utils/Validator.php';

class User
{
    private int $id;
    public string $name;
    public string $email;
    private string $password;
    private Validator $validator;

    public function __construct(int $id, string $name, string $email, string $password, Validator $validator) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->setEmail($email);
        $this->setPassword($password);
        $this->validator = $validator;
    }

    
    # Getter para acessar o Password hashado
    public function getPassword(): string
    {
        return $this->password;
    }

    # Setter para definir o Password hashado
    public function setPassword(string $password): void
    {
        if (!$this->validator->isStrongPassword($password)){
            throw new Exception("Senha fraca: Precisa de 8 Caracteres, 1 Maiúscula e 1 Número.");
        }

        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }



    # Getter para acessar o Email
    public function getEmail(): string
    {
        return $this->email;
    }

    # Setter para definir o Email
    public function setEmail(string $email): void
    {
        if (!$this->validator->isValidEmail($email)){
            throw new Exception("Email invalido");
        }

        $this->email = $email;
    }
  
    # Getter para acessar o Id
    public function getId(): int
    {
        return $this->id;
    }

    # Setter para definir o Id
    public function setId(int $id): void
    {
        $this->id = $id;
    }
  
}