drop table if exists VideoGames;

create table VideoGames (
    game_id integer not null primary key auto_increment,
    game_name varchar(100) not null,
    game_description_short varchar(500) not null,
    game_description_long varchar(2000) not null,
    game_author varchar(150) not null,
    game_year integer not null,
    game_image varchar(100) not null,
    game_type varchar(100) not null,
    game_price integer not null,
    game_number integer not null
) engine=innodb character set utf8 collate utf8_unicode_ci;


drop table if exists Users;

create table Users (
    user_id integer not null primary key auto_increment,
    user_email varchar(100) not null,
    user_password varchar(100) not null,
    user_lastName varchar(100) not null,
    user_firstName varchar(100) not null,
    user_adresse varchar(200) not null,
    user_zip integer not null,
    user_city varchar(100) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;