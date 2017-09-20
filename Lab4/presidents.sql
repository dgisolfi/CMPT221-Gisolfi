#This file creates the  database for CMPT 221 Lab 4
# Presidents of the United States 
#Daniel Gisolfi

#Drop existing table, Create table named presidents and use it
drop database if exists site_db ; 
create database site_db ; 
use site_db ;

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

# output the unsorted presidents table
EXPLAIN presidents;

# output the dead presidents sorted in ascending order by number.
SELECT	P.lname, P.num, P.dob
FROM	presidents AS P
ORDER BY P.NUM ASC;

# output the dead presidents sorted in ascending order by last name. 
SELECT	P.lname, P.num, P.dob
FROM 	presidents AS P
ORDER BY P.lname ASC;

# output the dead presidents sorted in descending order by dob.
SELECT	P.lname, P.num, P.dob
FROM 	presidents AS P
ORDER BY P.dob DESC;




