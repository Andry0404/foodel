drop table if EXISTS Proprietario;

create table Proprietario(
id_proprietario int AUTO_INCREMENT primary key,
  nome varchar(255) not null,
  cognome varchar(255) not null,
  email varchar(255) not null,
  data_nascita date not null,
  hashed_password varchar(255) not null
);