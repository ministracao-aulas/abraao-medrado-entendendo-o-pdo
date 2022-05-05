## 1 - Configurando o banco

1. Copie o arquivo `db-config-example.php` para `db-config.php`;
2. Ajuste os dados de configuração do banco;

## 2 - Abrindo o projeto no navegador (provendo/servindo o projeto)

Abra a pasta do projeto no terminal e execute:
```sh
php -S 0.0.0.0:8000 -t .
```
Depois de prover o projeto, abra no navegador `http://127.0.0.1:8000`;

## 3 - Executando o setup

> Isso criará as tabelas no banco de dados

**Pelo navegador**
- Depois de prover o projeto, abra no navegador `http://127.0.0.1:8000/setup.php`;

**Pelo terminal**
- Abra a pasta do projeto no terminal e execute:
```sh
php ./setup.php
```
