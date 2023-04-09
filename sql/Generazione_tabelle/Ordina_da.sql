drop table if exists Ordina_da;

create table Ordina_da(
    importo float(6, 3) not null,
    data_ordine date not null,
    quantita int not null,
    id_ristorante int,
    id_cliente int,
    foreign key(id_ristorante) REFERENCES Ristorante (id_ristorante),
    foreign key(id_cliente) REFERENCES Proprietario (id_cliente),
    PRIMARY KEY(id_ristorante, id_cliente)
);