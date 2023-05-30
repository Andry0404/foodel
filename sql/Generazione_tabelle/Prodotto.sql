drop table if EXISTS Prodotto;

create table Prodotto(
  id_prodotto int primary key AUTO_INCREMENT,
  prezzo float(6,2) not null,
  nome varchar(255) not null,
  allergeni varchar(255) not null,
  ingredienti varchar(255) not null,
  categoria varchar(255) not null check(categoria="antipasto" or categoria="primo" or categoria="secondo" or categoria="dessert")
);