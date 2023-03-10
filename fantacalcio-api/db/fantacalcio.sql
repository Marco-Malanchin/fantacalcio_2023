create database fantacalcio;

use fantacalcio;

create table `user`(
id INT unsigned auto_increment not null primary key,
email varchar(200) not null,
password varchar (200) not null,
nickname varchar(100) not null
);

create table team(
id INT unsigned auto_increment not null primary key,
id_user int unsigned not null,
id_legue int unsigned not null,
name varchar(100) not null,
score int not null
);

create table matches(
id INT unsigned auto_increment not null primary key,
match_number int unsigned not null,
id_legue int unsigned not null,
id_team1 int unsigned not null,
id_team2 int unsigned not null,
score_1 int unsigned not null,
score_2 int unsigned not null
);

create table legue(
id INT unsigned auto_increment not null primary key,
name varchar(100) not null
);

create table player(
id INT unsigned auto_increment not null primary key,
name varchar(100) not null,
surname varchar(100) not null,
`role` varchar(100) not null
);

create table user_legue(
id INT unsigned auto_increment not null primary key,
id_user INT unsigned not null, 
id_legue INT unsigned not null 
);

create table team_player(
id INT unsigned auto_increment not null primary key,
id_team INT unsigned not null, 
id_player INT unsigned not null 
);

alter table team add constraint fk_user_team foreign key ( id_user ) references `user` ( id );
alter table team add constraint fk_legue_team foreign key ( id_legue ) references legue ( id );
alter table team_player  add constraint fk_player_team foreign key ( id_team ) references team ( id );
alter table team_player  add constraint fk_player_team2 foreign key ( id_player ) references player ( id );
alter table user_legue  add constraint fk_user_legue foreign key ( id_user ) references `user` ( id );
alter table user_legue  add constraint fk_legue_user foreign key ( id_legue ) references legue ( id );
alter table matches  add constraint fk_matches_team foreign key ( id_team1 ) references team ( id );
alter table legue add id_creator int not null;
