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
	name 		TEXT 		NOT NULL,
	owner_fname	TEXT, 
	owner_lname	TEXT,
	finder_fname	TEXT,
	finder_lname	TEXT,
	description TEXT,
	create_date DATE 		NOT NULL,
	update_date DATE,
	room 		TEXT,
	owner 		TEXT,
	finder 		TEXT,
	status 		SET('found','lost', 'claimed') NOT NULL);

# Insert examples into database
INSERT INTO stuff(location_id, name, description, create_date, update_date, room, owner, status)
VALUES(4, "Hat", "A black baseball cap", "2017-11-10", "2017-11-10", 110, "Daniel Gisolfi", "lost"),
(7, "iPhone 6S", "Grey iPhone 6S with black silicone case", "2017-10-05", "2017-10-07", 205, "James Ekstract", "lost"),
(9, "Water bottle", "Green Gaterade water bottle", "2017-11-01", "2017-11-05", 104, "James Ekstract", "lost");

INSERT INTO stuff(location_id, name, description, create_date, update_date, room, finder, status)
VALUES(12, "Marist ID", "Marist ID with name John Doe", "2017-09-08", "2017-09-10", 227, "Daniel Gisolfi", "found"),
(15, "Lanyard/keys", "Red Marist lanyard with room and mail key", "2017-10-22", "2017-10-30", 105, "James Ekstract", "found"),
(18, "Lenovo laptop", "Black Lenovo Ideapad Y700 laptop", "2017-11-03", "2017-11-08", 210, "Daniel Gisolfi", "found");

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