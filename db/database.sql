create database if not exists LudusVisualis character set utf8 collate utf8_unicode_ci;
use LudusVisualis;

grant all privileges on LudusVisualis.* to 'Ludus_user'@'localhost' identified by 'secret';
