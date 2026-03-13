# Pedido System

![PHP](https://img.shields.io/badge/php-8.x-blue)
![PHPUnit](https://img.shields.io/badge/tests-PHPUnit-brightgreen)

Projeto simples em **PHP** desenvolvido para praticar conceitos de **backend, arquitetura em camadas e testes unitários**.

O sistema simula o fluxo de finalização de pedidos aplicando regras de negócio e validando o comportamento da aplicação através de **testes automatizados com PHPUnit**.

---

## Tecnologias utilizadas

* PHP
* Composer
* PHPUnit

---

## Estrutura do projeto

```
src/
├── Infrastructure
├── Model
├── Repository
└── Service

tests/
```

### Model

Representa as entidades do sistema.

### Service

Contém a lógica de negócio da aplicação.

### Repository

Responsável pela persistência de dados.

### Infrastructure

Serviços externos ou integrações com outros sistemas.

---

## Regras de negócio

O sistema possui as seguintes regras:

* Pedidos com valor menor ou igual a **0** são considerados inválidos.
* Pedidos com valor acima de **200** recebem **10% de desconto**.
* Após finalizar o pedido:

  * o pedido é salvo no repositório
  * um email de confirmação é enviado.

---

## Testes

Os testes foram implementados utilizando **PHPUnit**.

As dependências externas do `PedidoService`, como `PedidoRepository` e `EmailService`, são simuladas utilizando **mocks** para permitir o teste isolado da lógica de negócio.

Os testes cobrem:

* finalização de pedido válido
* aplicação de desconto
* tratamento de pedidos inválidos
* verificação de chamadas às dependências

---

## Conceitos praticados

Este projeto foi desenvolvido para praticar conceitos importantes de desenvolvimento backend:

* Testes unitários com PHPUnit
* Uso de mocks para isolamento de dependências
* Injeção de dependência
* Arquitetura em camadas (Service / Repository)
* Autoload PSR-4 com Composer
* Organização de código orientada a objetos

---

## Como executar o projeto

### Instalar dependências

```
composer install
```

### Executar os testes

```
vendor/bin/phpunit
```

---

## Objetivo do projeto

Este projeto foi desenvolvido como exercício de estudo para praticar boas práticas de desenvolvimento backend em PHP, incluindo organização de código e testes automatizados.
