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
VALUES(Now(), Now(), "Allied Health Science Building"),
	  (Now(), Now(), "Byrne House"),
	  (Now(), Now(), "Cannavino Library"),
	  (Now(), Now(), "Champagnat Hall"),
	  (Now(), Now(), "Chapel"),
	  (Now(), Now(), "Cornell Boathouse"),
	  (Now(), Now(), "Donnelly Hall"),
	  (Now(), Now(), "Dyson Center"),
	  (Now(), Now(), "Fern Tor"),
	  (Now(), Now(), "Fontaine Hall"),
	  (Now(), Now(), "Foy Townhouses"),	  
	  (Now(), Now(), "Greystone Hall"),
	  (Now(), Now(), "Hancock Center"),
	  (Now(), Now(), "Kieran Gatehouse"),
	  (Now(), Now(), "Kirk House"),
	  (Now(), Now(), "Lower Fulton Townhouses"),
	  (Now(), Now(), "Leo Hall"),
	  (Now(), Now(), "Longview Park"),
	  (Now(), Now(), "Lowell Thomas Communications Center"),
	  (Now(), Now(), "Lower New Townhouses"),
	  (Now(), Now(), "Lower West Townhouses"),
	  (Now(), Now(), "Marian Hall"),
	  (Now(), Now(), "Marist Boathouse"),
	  (Now(), Now(), "McCann Center"),
	  (Now(), Now(), "Mid-Rise Hall"),
	  (Now(), Now(), "New Gartland A"),
	  (Now(), Now(), "New Gartland B"),
	  (Now(), Now(), "New Gartland C"),
	  (Now(), Now(), "New Gartland D"),
	  (Now(), Now(), "St. Ann's Hermitage"),
	  (Now(), Now(), "St. Peter's"),
	  (Now(), Now(), "Sheahan Hall"),
	  (Now(), Now(), "Steel Plant Studios"),
	  (Now(), Now(), "Student Center"),
	  (Now(), Now(), "Upper Fulton Townhouses"),
	  (Now(), Now(), "Upper West Townhouses");