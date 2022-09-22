create database imobiliaria;
use imobiliaria;

create table imovel(
id int primary key auto_increment,
descricao varchar(200) not null,
foto longblob,
valor decimal(9,2),
tipo char(1),
fotoTipo varchar(20),
path varchar(200)
);

create table usuario(
id int auto_increment primary key,
login varchar(20),
senha varchar(100),
permissao char(1)
); 

CREATE TABLE GALERIA(
    idPicture INT PRIMARY KEY AUTO_INCREMENT,
    idImovel INT NOT NULL,
    path VARCHAR(50) NOT NULL,
    FOREIGN KEY (idImovel) REFERENCES imovel(id)
);