drop table if EXISTS Prodotto;

create table Prodotto(
id_prodotto int primary key AUTO_INCREMENT,
  prezzo varchar(255) not null,
  nome varchar(255) not null,
  allergeni varchar(255) not null,
  ingredienti varchar(255) not null
);