drop table if EXISTS Recensione;

create table Recensione(
id_recensione int primary key AUTO_INCREMENT,
  valutazione_stelle int not null check(valutazione_stelle>0 or valutazione_stelle<6),
  valutazione_recensione varchar(255) not null,
id_ristorante int,
  FOREIGN KEY (id_ristorante) REFERENCES Ristorante(id_ristorante)
);