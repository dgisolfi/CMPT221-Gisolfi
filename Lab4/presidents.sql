#This file creates the  database for CMPT 221 Lab 4
# Presidents of the United States 
#Daniel Gisolfi

drop database if exists presidents ; 
create database presidents ; 
use presidents ;

CREATE TABLE presidents(
id		INT			AUTO_INCREMENT 	PRIMARY KEY,
fname	TEXT		not null,
lname	TEXT		not null,
num		INT 		not null,
dob		DATETIME	not null
);