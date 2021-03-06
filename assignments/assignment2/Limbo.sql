#Limbo.sql
#Create and populate a database for Limbo
#Authors: James Ekstract, Daniel Gisolfi
#Version 0.1


#Create the database
CREATE DATABASE IF NOT EXISTS limbo_db;
USE limbo_db;

#Create the user table
CREATE TABLE IF NOT EXISTS users(
	user_id 	INT 	AUTO_INCREMENT 	PRIMARY KEY,
	first_name 	text,
	last_name 	text,
	email 		text,
	pass 		text,
	reg_date 	DATETIME);

#Populate the user table
INSERT INTO USERS(first_name, pass)
VALUES("admin", "gaze11e");

#Creates the stuff table
CREATE TABLE IF NOT EXISTS stuff(
	id 			INT AUTO_INCREMENT 	PRIMARY KEY,
	location_id INT 		NOT NULL,
	description TEXT 		NOT NULL,
	create_date DATETIME 	NOT NULL,
	update_date DATETIME 	NOT NULL,
	room 		TEXT,
	owner 		TEXT,
	finder 		TEXT,
	status 		SET('found','lost', 'claimed') NOT NULL);

#Creates the Locations table
CREATE TABLE IF NOT EXISTS locations(
	id 			INT 	 AUTO_INCREMENT 	PRIMARY KEY,
	create_date DATETIME NOT NULL,
	update_date DATETIME NOT NULL,
	name 		TEXT 	 NOT NULL);

#Populates the locations table
INSERT INTO locations(create_date, update_date, name)
VALUES(Now(), Now(), "Donnelly"),
	  (Now(), Now(), "Hancock"),
	  (Now(), Now(), "Dyson"),
	  (Now(), Now(), "Library"),
	  (Now(), Now(), "McCann"),
	  (Now(), Now(), "Student Center"),
	  (Now(), Now(), "Allied Health"),
	  (Now(), Now(), "Lowell Thomas"),
	  (Now(), Now(), "Fontain"),
	  (Now(), Now(), "Steel Plant"),
	  (Now(), Now(), "51 Fulton");

