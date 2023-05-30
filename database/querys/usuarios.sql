create table usuarios(
  id int not null primary key auto_increment,
  nome varchar(30) not null,
  idade int(3) not null,
  cep int(8) not null,
  logradouro varchar(50),
  complemento varchar(50),
  bairro varchar(50),
  localidade varchar(50),
  uf char(2)
);