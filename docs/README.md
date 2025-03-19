
# api_pedidos

Projeto criado com o objetivo de fornecer um sistema de gerenciamento de pedidos e itens desenvolvido em Laravel.

## Funcionalidades

- Crud de Pedidos
- Crud de itens
- Envio de e-mails após cadastramento de usuario de um novo pedido
- Envio especifico de dado dependendo do setor que vá receber

## Stack utilizada

**Back-end:** Laravel, php
**Autenticação** JWT
**Banco** MySQL

## Instalação

clone o repositório

```bash
   git clone git@github.com:beantz/observer_compras.git
```

Instale as dependências

```bash
   composer install
```
    
Configurar JWT

```bash

```

Execute as migration
```bash
   php artisan migrate
```

## Deploy

Para fazer o deploy desse projeto rode

```bash
   php artisan serve
```


## Aprendizados

Projeto em si foi criado com o objetivo de praticar conceitos de desing patterns, envio de e-mails, manipulação de dados com relacionamento, permite o cadatrasmento de usuarios, autenticação, crud de pedidos, itens, inseirir um item a um determinado pedido usando relacionamento de n x n. Aprendi a enviar notificação as partes interessadas quanto ao cadastramento de um novo usuario e a criação de um novo pedido, enviando um e-mail ao setor de estoque e financeiro, ambos envios com retorno de dados diferente para cada situação, fiz isso usando o padrão adapter. Até o momento são esses os principais aprendizados com o projeto.
