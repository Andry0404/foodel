drop table if EXISTS Cliente;

create table Cliente(
  id_cliente int primary key AUTO_INCREMENT,
  cognome varchar(255) not null,
  nome varchar(255) not null,
  indirizzo varchar(255) not null,
  email varchar(255) not null,
  data_nascita date not null,
  hashed_password varchar(255) not null
);