DROP DATABASE Zoo;

CREATE DATABASE Zoo;

USE Zoo;

CREATE TABLE Persona(
    nome varchar(50) NOT NULL,
    cod_persona INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    data_nascita INTEGER,
    mail varchar(40) NOT NULL,
	modalitaSchermo enum('chiara', 'scura' , 'rosa') not null default 'chiara',
    cognome varchar(50) NOT NULL,
	password varchar(50) not null
)ENGINE=INNODB;

insert into persona (nome, mail, cognome, password)
  value ('admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3');

CREATE TABLE Dipendenti (
    voto INTEGER DEFAULT NULL,
    nomignolo varchar(15) DEFAULT NULL,
    ferie varchar(100) DEFAULT NULL,
    orario_lavorativo integer NOT NULL DEFAULT 0,
    cod_dipendente INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	avvertimento integer not null DEFAULT 0,
    cod_persona INTEGER NOT NULL UNIQUE
) ENGINE=INNODB;


ALTER TABLE Dipendenti ADD FOREIGN KEY (cod_persona) REFERENCES Persona(cod_persona)
ON DELETE CASCADE
ON UPDATE CASCADE;

CREATE TABLE Utenti(
    cod_persona INTEGER NOT NULL,
	  animaliSeguiti varchar(50) default null
)ENGINE=INNODB;

ALTER TABLE Utenti ADD FOREIGN KEY (cod_persona) REFERENCES Persona(cod_persona)
ON DELETE CASCADE
ON UPDATE CASCADE;


CREATE TABLE Admin(
    cod_persona INTEGER NOT NULL
)ENGINE=INNODB;

ALTER TABLE Admin ADD FOREIGN KEY (cod_persona) REFERENCES Persona(cod_persona)
ON DELETE CASCADE
ON UPDATE CASCADE;

insert into Admin (cod_persona)
  value (1);

CREATE TABLE Biglietto (
    cod_biglietto INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cod_persona INTEGER not null,
    data INTEGER NOT NULL
) ENGINE=INNODB;

ALTER TABLE Biglietto ADD FOREIGN KEY (cod_persona) REFERENCES Persona(cod_persona)
ON DELETE CASCADE
ON UPDATE CASCADE;

CREATE TABLE CommessiCassa(
    cod_persona INTEGER NOT NULL
)ENGINE=INNODB;

ALTER TABLE CommessiCassa ADD FOREIGN KEY (cod_persona) REFERENCES Persona(cod_persona)
ON DELETE CASCADE
ON UPDATE CASCADE;

CREATE TABLE Strutture(
    cod_struttura integer AUTO_INCREMENT NOT NULL PRIMARY KEY
)ENGINE=INNODB;

CREATE TABLE Venditori(
    cod_persona INTEGER NOT NULL,
    cod_struttura INTEGER NOT NULL
)ENGINE=INNODB;

ALTER TABLE Venditori ADD FOREIGN KEY (cod_persona) REFERENCES Persona(cod_persona)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE Venditori ADD FOREIGN KEY (cod_struttura) REFERENCES Strutture(cod_struttura)
ON DELETE CASCADE
ON UPDATE CASCADE;

CREATE TABLE Curatori(
    cod_persona INTEGER NOT NULL
)ENGINE=INNODB;

ALTER TABLE Curatori ADD FOREIGN KEY (cod_persona) REFERENCES Persona(cod_persona)
ON DELETE CASCADE
ON UPDATE CASCADE;

CREATE TABLE ProfiloAnimale (
    nome varchar(50) NOT NULL PRIMARY KEY,
    eta_animale INTEGER NOT NULL,
    peso INTEGER NOT NULL,
    cod_specie INTEGER NOT NULL,
    musica varchar(50) DEFAULT NULL
) ENGINE=INNODB;


CREATE TABLE Cattivita(
    dataNascita INTEGER NOT NULL,
    fusoOrario INTEGER NOT NULL,
    nome_animale varchar(50) NOT NULL PRIMARY KEY
)ENGINE=INNODB;

ALTER TABLE Cattivita ADD FOREIGN KEY (nome_animale) REFERENCES ProfiloAnimale(nome)
ON DELETE CASCADE
ON UPDATE CASCADE;

CREATE TABLE Liberta(
    coordinate INTEGER NOT NULL,
    dataArrivo INTEGER NOT NULL,
    nome_animale varchar(50) NOT NULL PRIMARY KEY
)ENGINE=INNODB;

ALTER TABLE Liberta ADD FOREIGN KEY (nome_animale) REFERENCES ProfiloAnimale(nome)
ON DELETE CASCADE
ON UPDATE CASCADE;

CREATE TABLE Specie(
    cod_specie INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_specie varchar(50) NOT NULL
)ENGINE=INNODB;

alter table ProfiloAnimale add FOREIGN key (cod_specie) REFERENCES specie(cod_specie)
ON DELETE CASCADE
ON UPDATE CASCADE;

CREATE TABLE NegozioGiocattoli(
    cod_struttura INTEGER NOT NULl,
    nome_negozio varchar(20) not null,
    orario_apertura varchar(50) NOT NULL,
    orario_chiusura varchar(50) NOT NULL
)ENGINE=INNODB;

ALTER TABLE NegozioGiocattoli ADD FOREIGN KEY (cod_struttura) REFERENCES Strutture(cod_struttura)
ON DELETE CASCADE
ON UPDATE CASCADE;

CREATE TABLE ristoranti(
    cod_struttura INTEGER NOT NULL,
    nome_ristorante varchar(20) not null,
    orario_apertura varchar(50) NOT NULL,
    orario_chiusura varchar(50) NOT NULL
)ENGINE=INNODB;

ALTER TABLE ristoranti ADD FOREIGN KEY (cod_struttura) REFERENCES Strutture(cod_struttura)
ON DELETE CASCADE
ON UPDATE CASCADE;

create table menu(
  nome_Piatto varchar(20) primary key not null,
  prezzo integer not null
)engine=innoDB;

create table contiene(
  cod_struttura integer not null,
  nome_Piatto varchar(20) not null
)engine=innodb;

alter table contiene add PRIMARY KEY (cod_struttura, nome_Piatto);

ALTER TABLE contiene ADD FOREIGN KEY (cod_struttura) REFERENCES ristoranti(cod_struttura)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE contiene ADD FOREIGN KEY (nome_Piatto) REFERENCES menu(nome_Piatto)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE Utenti ADD FOREIGN KEY (animaliSeguiti) REFERENCES ProfiloAnimale(nome)
ON DELETE CASCADE
ON UPDATE CASCADE;

create table recensione(
  cod_struttura integer not null,
  valutazione integer not null,
  cod_persona integer not null,
  commento varchar(100)
)engine=innodb;

ALTER TABLE recensione ADD FOREIGN KEY (cod_struttura) REFERENCES strutture(cod_struttura)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE recensione ADD FOREIGN KEY (cod_persona) REFERENCES persona(cod_persona)
ON DELETE CASCADE
ON UPDATE CASCADE;

CREATE TABLE listaVergogna(
    cod_vergogna integer not null primary key auto_increment,
    mail varchar(50) not null
)engine=innoDB;

insert into menu (nome_Piatto, prezzo)
  value ("pizza margherita", 5),
        ("pizza salamino", 7);

insert into strutture ()
  value (),
        ();

insert into ristoranti (cod_struttura, nome_ristorante, orario_apertura, orario_chiusura)
  value(1, "pizzeria da nicola", 11, 23);

insert into contiene (cod_struttura, nome_Piatto)
  value (1, "pizza margherita"),
        (1, "pizza salamino");

insert into specie (nome_specie)
    value ("leone"),
          ("gatto"),
          ("cane"),
          ("piccione"),
          ("coccodrillo"),
          ("fenicottero");

insert into persona(nome, data_nascita, mail, cognome, password)
    value('luca', 1, 'luca@gmail.com', 'nardi', 'luca'),
         ('leo', 1, 'leo@gmail.com', 'ncino', 'leo'),
         ('matteo', 1, 'matteo@gmail.com', 'sarri', 'matteo');

insert into Curatori(cod_persona)
    value(2);

insert into ProfiloAnimale( nome, eta_animale, peso, cod_specie, musica)
  value('tigro', 4, 80, 1, 'rap');
