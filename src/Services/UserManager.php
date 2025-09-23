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
          $this->users = $users;
          $this->validator = $validator;
      }

      public function getAll(): array
      {
          return $this->users;
      }

      public function findById(int $id): ?User 
      {
          foreach ($this->users as $user) {
              if ($user->getId() === $id) {
                  return $user;
              }
          }
          return null;
      }

      public function findByEmail(string $email): ?User 
      {
          foreach ($this->users as $user) {
              if ($user->getEmail() === $email) { 
                  return $user;
              }
          }
          return null;
      }

      public function addUser (string $name, string $email, string $password): bool
      {
          if (!$this->validator->isValidEmail($email)) {
              echo "Erro: E-mail inválido.\n";
              return false;
          }
          if ($this->findByEmail($email) !== null) {
              echo "Erro: E-mail já está em uso.\n";
              return false;
          }
          if (empty($name)) {
              echo "Erro: Nome não pode ser vazio.\n";
              return false;
          }
          try {
              $user = new User(0, $name, $email, $password, $this->validator); 
              $nextId = empty($this->users) ? 1 : max(array_column($this->users, 'id')) + 1; 
              $user->setId($nextId);
              $this->users[] = $user;
              echo "Usuário cadastrado com sucesso.\n";
              return true;
          } catch (Exception $e) {
              echo "Erro ao cadastrar: " . $e->getMessage() . "\n";
              return false;
          }
      }

      public function login(string $email, string $password): bool
      {
          $user = $this->findByEmail($email);
          if ($user === null || !password_verify($password, $user->getPassword())) {
              echo "Credenciais inválidas.\n";
              return false;
          }
          echo "Login realizado com sucesso.\n";
          return true;
      }

      public function resetPassword(int $id, string $newPassword): bool
      {
          $user = $this->findById($id);
          if ($user === null) {
              echo "Usuário não encontrado.\n";
              return false;
          }
          if (!$this->validator->isStrongPassword($newPassword)) {
              echo "Erro: Senha fraca. Precisa de 8 caracteres, 1 maiúscula, 1 minúscula e 1 número.\n";
              return false;
          }
          $user->setPassword($newPassword);
          echo "Senha resetada com sucesso.\n";
          return true;
      }

      public function removeUser (int $id): bool
      {
          foreach ($this->users as $index => $user) {
              if ($user->getId() === $id) {
                  unset($this->users[$index]);
                  $this->users = array_values($this->users);
                  return true;
              }
          }
          return false;
      }
  }
  
