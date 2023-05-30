drop database if exists foodelDB;

create database foodelDB;

use foodelDB;

drop table if EXISTS Cliente;

create table Cliente(
  id_cliente int primary key AUTO_INCREMENT,
  cognome varchar(255) not null,
  nome varchar(255) not null,
  indirizzo varchar(255) not null,
  email varchar(255) not null,
  data_nascita date not null,
  hashed_password varchar(255) not null
);

drop table if EXISTS Proprietario;

create table Proprietario(
  id_proprietario int AUTO_INCREMENT primary key,
  nome varchar(255) not null,
  cognome varchar(255) not null,
  email varchar(255) not null,
  data_nascita date not null,
  hashed_password varchar(255) not null
);

drop table if EXISTS Ristorante;

create table Ristorante(
  id_ristorante int primary key AUTO_INCREMENT,
  nome varchar(255) not null,
  orario_apertura varchar(255) not null,
  orario_chiusura varchar(255) not null,
  indirizzo varchar(255) not null,
  num_telefono varchar(255)
);

drop table if EXISTS Prodotto;

create table Prodotto(
  id_prodotto int primary key AUTO_INCREMENT,
  prezzo float(6, 2) not null,
  nome varchar(255) not null,
  allergeni varchar(255) not null,
  ingredienti varchar(255) not null,
  categoria varchar(255) not null check(categoria="antipasto" or categoria="primo" or categoria="secondo" or categoria="dessert")
);

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

drop table if exists Possiede;

create table Possiede(
  id_ristorante int,
  id_proprietario int,
  foreign key(id_ristorante) REFERENCES Ristorante (id_ristorante),
  foreign key(id_proprietario) REFERENCES Proprietario (id_proprietario)
);

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

drop table if exists Scrive;

create table Scrive(
  id_recensione int,
  id_cliente int,
  foreign key(id_recensione) REFERENCES Recensione (id_recensione),
  foreign key(id_cliente) REFERENCES Cliente (id_cliente)
);

drop table if exists Vende;

create table Vende(
  id_ristorante int,
  id_prodotto int,
  foreign key(id_ristorante) REFERENCES Ristorante (id_ristorante),
  foreign key(id_prodotto) REFERENCES Prodotto (id_prodotto)
);