CREATE TABLE usuario(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(45),
    cpf varchar(15),
    senha varchar(45)
);

insert into usuario(nome,cpf,senha) VALUES
('Amanda', '123.123.123-12', 'deumate100'),
('Ana Maria', '345.345.345-34', '321');

CREATE TABLE cidade(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nome VARCHAR(50),
	cep VARCHAR(15),
    estado VARCHAR(15)
);


INSERT INTO cidade(nome,cep,estado) VALUES 
('Nova Londrina', '87.970-000', 'Paraná'), 
('Marilna', '87.960-000', 'Paraná');

CREATE TABLE funcionario(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    cpf varchar(15),
    celular varchar(15),
    endereco varchar(255),
    numero INT,
    bairro varchar(255),
    email varchar(255),
    cargo varchar(255),
    salario varchar(255),
    cidade_id int REFERENCES cidade(id)
    );

INSERT INTO funcionario(nome,cpf,celular,endereco,numero,bairro,email,cargo,salario,cidade_id) VALUES
('Pâmela', '777.777.777-77', '(44)97777-7777', 'Rua Nova Olimpia', 500, 'Centro', 'pamela@gmail.com', 'Gerente', '4.550', 2);

CREATE TABLE cliente(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    cpf varchar(15),
    celular varchar(15),
    endereco varchar(255),
    numero INT,
    bairro varchar(255),
    email varchar(255),
    cidade_id int REFERENCES cidade(id)
    );

INSERT INTO cliente(nome, cpf, celular, endereco, numero, bairro, email, cidade_id) values
('Dominique', '333.333.333-33', '(44)93333-3333', 'Rua Santos', 55, 'Centro', 'dominique@gmail.com', 1)

create table venda(
    id int PRIMARY KEY not null AUTO_INCREMENT,
    obs varchar(255),
    valor_total int,
    quantidade_total int,
    data_venda datetime DEFAULT CURRENT_TIMESTAMP,
    cliente_id int REFERENCES cliente(id),
    funcionario_id int REFERENCES funcionario(id)
    );

insert into venda(obs, valor_total, quantidade_total, cliente_id, funcionario_id) VALUES
('Venda com pendência', 50, 10, 1,1);

create table produto(
    id int AUTO_INCREMENT primary key not null,
    nome varchar(255) not null,
    preco decimal(10,2) not null,
    estoque int,
    custo int,
    lucro int,
    margem INT
);

insert into produto(nome, preco, estoque, custo, lucro, margem) VALUES
('Mouse', 70 ,3, 40,30,90),
('Teclado', 100, 10, 50,50,100);

CREATE TABLE item_venda (
id int AUTO_INCREMENT PRIMARY KEY,
quantidade int, 
valor decimal(10,2),
venda_id int REFERENCES venda(id),
produto_id int REFERENCES venda(id)
);

insert into item_venda(quantidade, valor, venda_id, produto_id) VALUES
(2,140,1,1),
(2,140,1,2);