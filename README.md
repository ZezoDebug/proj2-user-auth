# Sistema de Usuários e Autenticação

**Disciplina:** Design Patterns & Clean Code  
**Projeto:** Sistema de Usuários e Autenticação em PHP  
**Alunos:** Felipe Souza Garcia – RA: 1990279 **//** Jose Vitor de Almeida Lima – RA: 1994104

---

## **Descrição do Projeto**
Sistema simples em PHP que simula cadastro, login e reset de senha de usuários, aplicando POO, boas práticas (PSR-12, KISS, DRY) e segurança com hash de senha.

Todos os dados são fixos em arrays PHP, sem necessidade de banco de dados.

---

## **Estrutura de Pastas**

src/

├── Data/

│ └── users.php # Array inicial de usuários

├── Models/

│ └── User.php # Classe User

├── Services/

│ └── UserManager.php # Classe UserManager

├── Utils/

│ └── Validator.php # Validações de email e senha

├── public/

│ └── index.php # Testes e execução

└── README.md


---

## **Funcionalidades Implementadas**

1. Cadastro de usuário
   - Validação de email
   - Validação de senha forte
   - Hash seguro de senha
   - Evita emails duplicados

2. Login de usuário
   - Validação de credenciais com `password_verify`
   - Retorno de sucesso ou falha

3. Reset de senha
   - Atualiza senha de usuário existente
   - Aplica validações de força de senha

4. Listagem e remoção de usuários

---

## **Casos de Uso / Cenários de Teste**

1. **Cadastro válido**  
   - Entrada: nome `Maria Oliveira`, email `maria@email.com`, senha `Senha123`  
   - Resultado esperado: usuário cadastrado com sucesso

2. **Cadastro com e-mail inválido**  
   - Entrada: nome `Pedro`, email `pedro@@email`, senha `Senha123`  
   - Resultado esperado: mensagem de erro → “E-mail inválido”

3. **Tentativa de login com senha errada**  
   - Entrada: email `joao@email.com`, senha `Errada123`  
   - Resultado esperado: mensagem de erro → “Credenciais inválidas”

4. **Reset de senha válido**  
   - Entrada: id `1`, nova senha `NovaSenha1`  
   - Resultado esperado: senha alterada com sucesso

5. **Cadastro de usuário com e-mail duplicado**  
   - Entrada: email já existente no array (`joao@email.com`)  
   - Resultado esperado: mensagem de erro → “E-mail já está em uso”

---

## **Como Rodar o Projeto**
1. Instale o XAMPP ou outro servidor PHP local.
2. Copie o projeto para a pasta `htdocs` (ou equivalente) do XAMPP.
3. Abra o navegador e acesse: [http://localhost/proj2-user-auth/src/public/index.php](http://localhost/proj2-user-auth/src/public/index.php)
4. Os resultados dos cenários de teste serão exibidos no navegador ou console.

---

## **Limitações**
- Dados não persistem entre execuções (apenas arrays em memória)
- Sem interface gráfica
- Não utiliza frameworks externos
- Apenas PHP puro, seguindo PSR-12
