drop database if exists ssa20142015;
create database ssa20142015
  default character set utf8
  default collate utf8_general_ci;
use ssa20142015;

create table dojave (
sifra int not null primary key auto_increment,
pas_id int not null,
korisnici_id int not null,
datum datetime
) engine=innodb;

create table pas (
sifra int not null primary key auto_increment,
status_psa int not null,
ime varchar(300),
opis varchar (300),
lokacija varchar(300)
) engine=innodb;

create table status_psa (
sifra int not null primary key auto_increment,
naziv_pas varchar(300)
) engine=innodb;

create table korisnici (
sifra int not null primary key auto_increment,
ime varchar(300),
prezime varchar(300),
email varchar(300),
lozinka varchar(300),
status_korisnika int not null
) engine=innodb;

create table status_korisnika (
sifra int not null primary key auto_increment,
naziv_korisnika varchar(300)
) engine=innodb; 

alter table dojave add foreign key(pas_id) references pas(sifra);
alter table pas add foreign key(status_psa) references status_psa(sifra); 
alter table dojave add foreign key(korisnici_id) references korisnici(sifra);
alter table korisnici add foreign key(status_korisnika) references status_korisnika(sifra);

insert into status_psa (naziv_pas) values ('izgubljen');
insert into status_psa (naziv_pas) values ('pronađen');

insert into status_korisnika (naziv_korisnika) values ('volonter');
insert into status_korisnika (naziv_korisnika) values ('anoniman korisnik');
insert into status_korisnika (naziv_korisnika) values ('korisnik');

insert into pas (status_psa, ime, opis, lokacija) values (2, 'Miki', 'štene hrvatskog ovčara', 'Retfala');
insert into pas (status_psa, ime, opis, lokacija) values (2, 'Flafi', 'crni mješanac', 'Filozofski fakultet Osijek');
insert into pas (status_psa, ime, opis, lokacija) values (1, NULL, 'mješanac njemačkog ovčara', 'Reisnerova 115');

insert into korisnici (ime, prezime, email, lozinka, status_korisnika) values ('Ana', 'Anić', 'aanic@yahoo.com', md5('anaanic123'), 1);
insert into korisnici (ime, prezime, email, lozinka, status_korisnika) values (NULL, NULL, 'something@gmail.com', md5('123456789'), 2);
insert into korisnici (ime, prezime, email, lozinka, status_korisnika) values ('Pero', 'Perić', 'pero@gmail.com', md5('perojesuper'), 3);

insert into dojave (pas_id, korisnici_id, datum) values (1, 1, '2015-01-01');
insert into dojave (pas_id, korisnici_id, datum) values (2, 2, '2015-01-01');
insert into dojave (pas_id, korisnici_id, datum) values (3, 3, '2015-01-02');


create table neobradene_dojave (
sifra int not null primary key auto_increment,
vrsta varchar(10) not null,
poruka text not null,
datum datetime not null,
odobreno boolean not null
) engine=innodb;

create table operater (
sifra int not null primary key auto_increment,
email varchar(50) not null,
lozinka char(32) not null,
ime varchar(50) not null,
prezime varchar(50) not null
) engine=innodb;

insert into operater(email,lozinka,ime,prezime) values ('tjakopec@gmail.com',md5('t'),'Tomislav','Jakopec');
