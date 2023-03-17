drop table if exists Vende;

create table Vende(
    id_ristorante int,
    id_prodotto int,
    foreign key(id_ristorante) REFERENCES Ristorante (id_ristorante),
    foreign key(id_prodotto) REFERENCES Prodotto (id_prodotto)
);