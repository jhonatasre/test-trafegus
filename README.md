# Projeto de Gerenciamento de Motoristas e Veículos

Este é um projeto para gerenciar motoristas e veículos usando PHP, MySQL e Doctrine ORM.

## Requisitos

Antes de iniciar o projeto, certifique-se de ter o seguinte instalado:

- **Docker** (para rodar o banco de dados MySQL e o ambiente da aplicação)
- **Docker Compose** (para orquestrar os contêineres)
- **PHP** (se necessário para desenvolvimento)
- **Composer** (para gerenciar dependências do PHP)

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

### 3. Acessar a aplicação

Com os contêineres em execução, acesse a aplicação no navegador:

- **Aplicação**: [http://localhost](http://localhost)

### 4. Banco de Dados

O arquivo `banco.sql` será automaticamente executado no contêiner MySQL na primeira inicialização, criando as tabelas `drivers` e `vehicles`. O banco de dados utilizado é o `docker`, com as credenciais padrão definidas no arquivo `docker-compose.yml`.

- **Usuário**: `docker`
- **Senha**: `docker`
- **Banco de dados**: `docker`

Você pode acessar o banco diretamente pelo contêiner ou conectar-se ao MySQL localmente usando as credenciais fornecidas.

```bash
docker exec -it <nome_do_container> mysql -u docker -p
```

### 5. Dependências

Se você precisar instalar ou atualizar as dependências PHP do projeto, pode usar o Composer. Execute o comando abaixo dentro do contêiner da aplicação:

```bash
docker exec -it <nome_do_container_da_aplicacao> composer install
```

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

---

## Configuração do Doctrine ORM

O projeto está configurado para usar o Doctrine ORM para gerenciar o banco de dados. As entidades do Doctrine estão localizadas no diretório `src/Entity`.

- **Configuração do banco de dados**: O banco de dados MySQL está configurado com o nome `docker`, e as credenciais são definidas em `docker-compose.yml`:

  ```php
  'dbname' => 'docker',
  'user' => 'root',
  'password' => 'root',
  'host' => 'database',
  'driver' => 'pdo_mysql',
  ```

