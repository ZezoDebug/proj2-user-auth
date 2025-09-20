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

    # Retornar os Usuários
    public function getAll(): array
    {
        return $this-users;
    }

    # Buscar o Usuário pelo ID
    public function findById(int $id): ?User
    {
        foreach ($this->users as $users) {
            if($user->getId() === $id){
                return $user;
            }
        }
        return null;
    }

    # Buscar o Usuário pelo Email
    public function findByEmail(string $email): ?User
    {
        foreach ($this->users as $users) {
            if($user->email === $email){
                return $user;
            }
        }
        return null;
    }

    # Adicionar um Usuário Novo
    public function addUser(User $user): bool
    {
        # checagem de Email já existente
        if($this->findByEmail($user->email) !==null){
            return false;
        }

        $this->user[] = $user;
        return true;
    }

    # Excluir um Usuário usando o ID
    public function removeUser(int $id): bool
    {
        foreach ($this->users as $index =>$user) {
            if($user->getId() === $id) {

                # Remove o Usuário do array
                unset($this->users[$index]);

                # Reindexa o array para manter a sequencia
                $this->users = array_values($this->users);
                return true;
            }
        }
        return false;
    }

}