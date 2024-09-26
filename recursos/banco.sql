CREATE TABLE usuario(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(45),
    cpf varchar(15),
    senha varchar(45)
);

insert into usuario(nome,cpf,senha) VALUES
('Amanda', '123.123.123-12', 'deumate100'),
('Ana Maria', '345.345.345-34', '321');