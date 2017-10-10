# limbo.sql
# Purpose: Creates and populates the limbo database
# Authors: James Ekstract, Daniel Gisolfi
# Version 0.1
 
# Create and use limbo_db database
CREATE DATABASE IF NOT EXISTS limbo_db;
USE limbo_db;
 
# Create users table
CREATE TABLE IF NOT EXISTS users(
        user_id     INT     AUTO_INCREMENT PRIMARY KEY, 
        first_name  TEXT, 
        last_name   TEXT,
        email       TEXT,
        pass        TEXT,
        reg_date    DATETIME);
 
# Populate users table
INSERT INTO users (first_name, pass)
VALUES ("admin", "gaze11e");
 
# Create stuff table
CREATE TABLE IF NOT EXISTS stuff(
        id          INT                             AUTO_INCREMENT PRIMARY KEY, 
        location_id INT                             NOT NULL,
        description TEXT                            NOT NULL,
        create_date DATETIME                        NOT NULL,
        update_date DATETIME                        NOT NULL,
        room        TEXT,
        owner       TEXT,
        finder      TEXT,
        status      SET('found', 'lost', 'claimed') NOT NULL);
 
# Create locations table
CREATE TABLE IF NOT EXISTS locations(
        id          INT         AUTO_INCREMENT PRIMARY KEY,
        create_date DATETIME    NOT NULL,
        update_date DATETIME    NOT NULL,
        name        TEXT        NOT NULL);
 
# Populate locations table
INSERT INTO locations(create_date, update_date, name)
VALUES(Now(), Now(), "Donnelly"),
      (Now(), Now(), "Hancock"),
      (Now(), Now(), "Dyson"),
      (Now(), Now(), "Library"),
      (Now(), Now(), "McCann"),
      (Now(), Now(), "Student Center"),
      (Now(), Now(), "Allied Health"),
      (Now(), Now(), "Lowell thomas"),
      (Now(), Now(), "Fontaine"),
      (Now(), Now(), "Steel Plant"),
      (Now(), Now(), "51 Fulton");