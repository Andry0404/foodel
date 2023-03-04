drop table if EXISTS Ristorante;

create table Ristorante(
  id_ristorante int primary key AUTO_INCREMENT,
  nome varchar(255) not null,
  orario_apertura varchar(255) not null,
  orario_chiusura varchar(255) not null,
  indirizzo varchar(255) not null,
  num_telefono varchar(255)
);