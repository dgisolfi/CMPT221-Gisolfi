#Drop existing table, Create table named presidents and use it
drop database if exists site_db ; 
create database site_db ; 
use site_db ;

CREATE TABLE IF NOT EXISTS prints
(
  id	INT AUTO_INCREMENT PRIMARY KEY ,
  name	VARCHAR(32) ,
  price	DECIMAL(6,2)
) ;

INSERT INTO prints ( name , price )

VALUES
( "Merry Structure" , 29.99 ) ,
( "Heavy Red" , 24.99 ) ,
( "Black Lines" , 45.99 ) ;

#Create new table called presidents in site_db
drop table if exists presidents ;
CREATE TABLE presidents(
id		INT			AUTO_INCREMENT 	PRIMARY KEY,
fname	TEXT		not null,
lname	TEXT		not null,
num		INT 		not null,
dob		DATETIME	not null
);

#Populate table
INSERT INTO presidents (fname, lname, num, dob)
VALUES ('George', 'Washington', 1,	'1732:02:22' ),             
        ('Andrew', 'Jackson', 7, '1829:03:04'), 
        ('Ronald' , 'Reagan', 40, '1911:02:06'),
		('John','Kennedy',35,'1917:05:29'),
		('Barack','Obama',44 ,'1961:08:04');


SELECT * FROM prints ;

SELECT * FROM presidents ;