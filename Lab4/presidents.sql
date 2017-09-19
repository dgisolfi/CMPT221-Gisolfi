#This file creates the  database for CMPT 221 Lab 4
# Presidents of the United States 
#Daniel Gisolfi

#Drop existing table, Create table named presidents and use it
drop database if exists presidents_db ; 
create database presidents_db ; 
use presidents_db ;

#Create new table called presidents in presidents_db
drop table if exists presidents ;
CREATE TABLE presidents(
id		INT			AUTO_INCREMENT 	PRIMARY KEY,
fname	TEXT		not null,
lname	TEXT		not null,
num		INT 		not null,
dob		DATETIME	not null
);

For dob use 00:00:00 for HH:MM:SS

# output the unsorted presidents table
EXPLAIN presidents;

# output the dead presidents sorted in ascending order by number.
SELECT	lname, num, dob
FROM	presidents
WHERE	ORDERBY NUM ASC;

# output the dead presidents sorted in ascending order by last name. 
SELECT	lname, num, dob
FROM 	presidents AS P
WHERE 	ORDERBY lname ASC;

# output the dead presidents sorted in descending order by dob.
SELECT	lname, num, dob
FROM 	presidents AS P
WHERE 	ORDERBY dob DESC;




