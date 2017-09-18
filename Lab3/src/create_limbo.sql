drop database if exists limbo_db; 
create database limbo_db ; 
use limbo_db ;

CREATE TABLE Stuff(
id int,
descr text,
color text,
year int
);

EXPLAIN Stuff;