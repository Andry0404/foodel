drop table if EXISTS Recensione;

create table Recensione(
  id_recensione int primary key AUTO_INCREMENT,
  valutazione_stelle int not null check(
    valutazione_stelle > 0
    or valutazione_stelle < 6
  ),
  valutazione_recensione varchar(255),
  id_ristorante int,
  data_recensione varchar(255) not null,
  FOREIGN KEY (id_ristorante) REFERENCES Ristorante(id_ristorante)
);