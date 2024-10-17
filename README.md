# tabela_produtos_php
teste de php 

Tabela de controle de estoque


Um formulário que permite adicionar produtos a uma tabela no banco de dados MySQL.
Os produtos contém:
Nome 
Preço 
Quantidade em Estoque 
Descrição
Categoria 



MySql
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    quantidade_em_estoque INT NOT NULL,
    descricao TEXT,
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
