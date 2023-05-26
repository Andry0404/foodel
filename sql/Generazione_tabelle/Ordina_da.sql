drop table if exists Ordina_da;

create table Ordina_da(
    quantita int not null,
    data_ordine varchar(255) not null,
    id_ristorante int,
    id_cliente int,
    id_prodotto int,
    foreign key(id_ristorante) REFERENCES Ristorante(id_ristorante),
    foreign key(id_cliente) REFERENCES Cliente(id_cliente),
    foreign key(id_prodotto) REFERENCES Prodotto(id_prodotto),
    primary key(id_cliente, id_ristorante, data_ordine, id_prodotto)
);