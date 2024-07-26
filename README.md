# Projeto: Busca de Países em Laravel

## Objetivo

O projeto tem como objetivo permitir ao usuário buscar informações sobre países armazenados no banco de dados. Ao digitar o nome ou parte do nome de um país em um campo de busca, o sistema deve retornar todos os registros que correspondem à pesquisa.

## Estrutura do Projeto

### Frontend

* Utilização de Blade templates para criar a interface de busca.
* Formulário com um campo de entrada (input) onde o usuário digita o nome do país.

### Backend

* Framework Laravel para gerenciar a aplicação.
* Controlador para gerenciar as requisições de busca.
* Modelo Eloquent para interagir com a tabela de países no banco de dados.
* Rota para processar a requisição de busca.

### Instalação

Siga as instruções abaixo para configurar o projeto em sua máquina local.

### Pré-requisitos

* PHP >= 7.3
* Composer
* Laravel >= 8.x
* MySQL

### Passos para Instalação

* Clone o repositório:

```
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

* Instale as dependências do Composer:

```
composer install
```

* Copie o arquivo .env.example para .env:

```
cp .env.example .env
```

* Configure o arquivo .env com as credenciais do banco de dados:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

* Gere a chave da aplicação:

``` 
php artisan key:generate
```

* Execute as migrações para criar as tabelas no banco de dados:

```
php artisan migrate
```

* Inicie o servidor de desenvolvimento:

```
php artisan serve
```
