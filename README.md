# Sistema de Locadora
---

Sistema em desenvolvido para fins de estudo utilizando as tecnologias `PHP`, `Laravel`, `MySQL`, `HTML`, `CSS`, `Javascript` e `Docker`.

### Executar Com o Docker
---

Basta executar o script `config.sh` e o mesmo se encarrega de preparar o ambiente.
O `config.sh` executa o seguinte passo a passo:
- Inicializar os containers e fazer build dos mesmos.
- Copiar o `.env.example` para `.env`.
- Instalar os pacotes da aplicação.
- Gerar chave da aplicação.
- Criar tabelas e popular o banco de dados.

Feito o passo a passo acima, a aplicação estará funcionando na porta `8000` e o banco de dados `MySQL` na porta 3306.

### Executar Sem o Docker
---
Passo a passo para inicializar o projeto sem o uso do `Docker`:
- Copiar o `env.example` para `.env`.
- Instalar os pacotes (`composer install`).
- Configurar a parte de banco de dados no `.env` (Chaves com prefixo `DB_`).
- Executar `php artisan key:generate` para gerar a chave da aplicação.
- Executar `php artisan migration:fresh --seed` para gerar as tabelas e as popular com dados de teste.
- Executar `php artisan serve` para executar a aplicação na porta `8000`.

### Autenticação
---

Para logar na aplicação após popular o banco de dados (No processo utilizando o `Docker` isso já é feito de maneira automática pelo script de configuração), basta utilizar as seguintes credenciais:

- Usuário/E-mail: `admin@mail.com`
- Senha: `123`
