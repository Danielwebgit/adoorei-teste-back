<p align="center">
  <img src="https://camo.githubusercontent.com/cf25d81ab5acf028eda0aa2d361aca96198ef9d789a12a7e9b9931c8c799e297/68747470733a2f2f61646f6f7265692e73332e75732d656173742d322e616d617a6f6e6177732e636f6d2f696d616765732f6c6f6a655f74657374655f6c6f676f61646f6f7265695f313636323437363636332e706e67" alt="Alt Text">
</p>

#### Organizado pela empresa Adoorei.
#### Desenvolvedor Back-End -  Daniel Rocha.
#### Projeto prático de Back-End - Laravel - php 
Foi usado o laravel versão 10 e php 8.1.

-Descrição do teste, ( ou roteiro ).

### Utilizando o Laravel cria uma API Rest, que resolva o seguinte cenário:

    A Loja ABC LTDA, vende produtos de diferentes nichos. No momento precisamos registrar a venda de celulares.

    Não vamos nos preocupar com o cadastro de produtos, porém precisamos ter uma tabela em nosso banco contendo os aparelhos celulares que vão ser vendidos:

- A API vai ter endpoints que possibilitam:

>Listar produtos disponíveis:

>Cadastrar nova venda:

>Consultar vendas realizadas:

>Consultar uma venda específica:

>Cancelar uma venda:

>Cadastrar novos produtos a uma venda:

- Outros recurso implementados que não foram pedidos no teste

>Serviço de autenticação:

>Proteção de rotas com middleware:

- Breve resumo de como foi desenvolvido:

Foi utilizado recursos do container docker podemos garantir que o projeto seja executado de forma isolada
e compartilhando os mesmos recursos a nível de máquinas, garantindo que com alguns comandos simples o
projeto esteja de pé em poucos minutos.
Foi aborado conceitos relacionados a padrões de projetos como por exemplo SOLID, com esses 5 princípios é possível desenvolveer sistemas 
mais compreensíveis, flexíveis e sustentáveis.

- O banco de dados foi estruturado com as seguintes entidades:

    $ - categories

    $ - products

    $ - sales

    $ - sale_items

- Adicionado Testes unitário para as seguintes funções:

>calculatePrice:


>calculePriceTotal

## Instalação para primeira vez de uso.

Comandos para iniciar o projeto:

Instalar as dependências:


Antes de configurar com os comandos configure o .env na raiz do projeto, pode copiar  direto do arquivo .env.example.

Dito isso vamos aos principais comandos:
> composer install:

Executa o Docker compose, sertifique-se de ter o Docker instalado em sua máquina.

>docker compose up -d --build

Uma vez com o container de pé, vamos dar o comando para entrar dentro da máquina virtual do docker e rodar os comando necessários para finalizar a instalacao do projeto

>docker exec -it (nome ou ID do container) bash

Dentro do container, vamos rodar mais alguns comandos:

>php artisan migrate

>php artisan DatabaseSeeder

Praticamente pronto, não é simples? ; )

**Rotas Post - Login**

**Rota para fazer login com os seguintes dados:

* `http://localhost:8986/api/v1/auth/user/login`

        
```json
{
	"email": "adoorei@gmail.com",
	"password": "12345"
}
```
        

**Rotas Post - logout/**

- Finaliza o acesso, invalidando o token do JWT
* `http://localhost:8986/api/v1/auth/user/logout`

**Rotas Get - products/**

- Lista todos os produtos disponíveis
* `http://localhost:8986/api/v1/products`

**Rotas Post - sales/**
- Adiciona um produto para uma venda
* `http://localhost:8986/api/v1/sales/store`
```json

{
	"sales": 
	[
		{
		"product_id": 2,
		"amount": 1
		}
	]
}

```

**Rotas Put - sales/**
- Cancela alterando o status da venda para cancelado
* `http://localhost:8986/api/v1/sales/cancel/2`


**Rotas Get - sales/**
- Consultar uma venda específica
* `http://localhost:8986/api/v1/sales/show/{saleId}`

**Rotas Post - sales/**
- Adiciona itens a uma venda
* `http://localhost:8986/api/v1/sales/update/{saleId}`
```json

{
	"sales": 
	[
		{
		"product_id":2,
		"amount": 1
		}
	]
}

```
