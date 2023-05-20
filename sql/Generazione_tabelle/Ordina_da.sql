drop table if exists Ordina_da;

create table Ordina_da(
    id_ordine int primary key AUTO_INCREMENT,
    importo float(6, 3) not null,
    data_ordine date not null,
    quantita int not null,
    id_ristorante int,
    id_cliente int,
    foreign key(id_ristorante) REFERENCES Ristorante(id_ristorante),
    foreign key(id_cliente) REFERENCES Cliente(id_cliente)
);