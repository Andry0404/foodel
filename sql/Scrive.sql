drop table if exists Scrive;

create table Scrive(
 id_recensione  int,
 id_cliente int,
    foreign key(id_recensione) REFERENCES Recensione (id_recensione),
    foreign key(id_cliente) REFERENCES Proprietario (id_cliente)
);