drop table if exists Possiede;

create table Possiede(
 id_ristorante  int,
 id_proprietario int,
    foreign key(id_ristorante) REFERENCES Ristorante (id_ristorante),
    foreign key(id_proprietario) REFERENCES Proprietario (id_proprietario)
);