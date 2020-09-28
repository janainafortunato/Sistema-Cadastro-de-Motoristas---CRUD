CREATE DATABASE FUSION_TESTE;

USE FUSION_TESTE;

CREATE TABLE admin(
id_admin INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(200) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(30) NOT NULL,
PRIMARY KEY(id_admin)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO admin( id_admin, nome, email, password )VALUES( 1, 'teste', 'teste@teste.com', '123');

USE FUSION_TESTE;

CREATE TABLE cadastro_motorista(
id_cadastro_motorista INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(200) NOT NULL,
email VARCHAR(100) NOT NULL,
cpf VARCHAR(30) NOT NULL,
situacao VARCHAR(20) NOT NULL,
status VARCHAR(10)NOT NULL,
admin_fk INT,
PRIMARY KEY(id_cadastro_motorista),
FOREIGN KEY (admin_fk) REFERENCES admin(id_admin)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO cadastro_motorista( id_cadastro_motorista, nome, email, cpf, situacao, status )VALUES( 1, 'teste', 'teste@teste.com', '48284032058', 'livre', 'ativo');


