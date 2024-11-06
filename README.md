# Projeto de Gerenciamento de Motoristas e Veículos

Este é um projeto para gerenciar motoristas e veículos usando PHP, MySQL, **Doctrine ORM** e **Doctrine Migrations**.

## Requisitos

Antes de iniciar o projeto, certifique-se de ter o seguinte instalado:

- **Docker** (para rodar o banco de dados MySQL e o ambiente da aplicação)
- **Docker Compose** (para orquestrar os contêineres)

## Iniciando o Projeto

### 1. Clonar o repositório

Primeiro, clone o repositório para sua máquina local:

```bash
git clone https://github.com/jhonatasre/test-trafegus
cd test-trafegus
```

### 2. Construir e iniciar os contêineres

Este projeto usa Docker para contêinerizar a aplicação e o banco de dados. Para iniciar o projeto, use o Docker Compose.

```bash
docker-compose up --build
```

Isso irá construir e iniciar os contêineres necessários para o MySQL e a aplicação PHP. A aplicação será acessível na URL `http://localhost` e o banco de dados estará disponível no contêiner MySQL.

### 3. Executar as migrações do banco de dados

Após iniciar o projeto e garantir que o banco de dados esteja rodando, execute as migrações usando o **Doctrine Migrations** para garantir que a estrutura do banco de dados esteja atualizada. O comando a seguir será executado automaticamente ao iniciar o contêiner da aplicação (por meio do `docker-compose`), mas você também pode rodá-lo manualmente caso precise:

```bash
docker-compose exec application /bin/bash -c "php vendor/bin/doctrine-migrations migrate --no-interaction"
```

Este comando aplicará as migrações pendentes no banco de dados para garantir que as tabelas e dados estejam corretos.

### 4. Acessar a aplicação

Com os contêineres em execução, acesse a aplicação no navegador:

- **Aplicação**: [http://localhost](http://localhost)

---

## Acessar o PhpMyAdmin

Este projeto também inclui um contêiner do PhpMyAdmin, que permite gerenciar o banco de dados MySQL via interface gráfica.

Para acessar o PhpMyAdmin, siga as etapas:

1. **Iniciar o PhpMyAdmin**: O PhpMyAdmin já está configurado no Docker Compose e será iniciado automaticamente junto com o banco de dados e a aplicação. Ele estará acessível na seguinte URL:

   - **PhpMyAdmin**: [http://localhost:8080](http://localhost:8080)

2. **Credenciais de acesso**:
   - **Host do banco de dados**: `database`
   - **Usuário**: `root`
   - **Senha**: `root`
   - **Banco de dados**: `docker`

---

## Rotas da Aplicação

O projeto utiliza o framework Laminas para gerenciar as rotas e os controladores. Aqui estão as rotas principais da aplicação:

### 1. **Página Inicial**

- **Rota**: `/`
- **Método**: `GET`
- **Controlador**: `Controller\IndexController`
- **Ação**: `index`

### 2. **Rota de Motoristas (Driver)**

- **Rota**: `/driver[/:action[/:id]]`
- **Método**: `GET`, `POST`, `PUT`, `DELETE`
- **Controller**: `Controller\DriverController`
- **Ações possíveis**:
  - `index`: Lista todos os motoristas.
  - `create`: Cria um novo motorista.
  - `update`: Atualiza as informações de um motorista existente.
  - `delete`: Deleta um motorista.

### 3. **Rota de Veículos (Vehicle)**

- **Rota**: `/vehicle[/:action[/:id]]`
- **Método**: `GET`, `POST`, `PUT`, `DELETE`
- **Controller**: `Controller\VehicleController`
- **Ações possíveis**:
  - `index`: Lista todos os veículos.
  - `create`: Cria um novo veículo.
  - `update`: Atualiza as informações de um veículo existente.
  - `delete`: Deleta um veículo.
