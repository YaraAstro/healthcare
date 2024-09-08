-- create database
CREATE DATABASE lnbtidb;

-- create user
CREATE USER 'lnbtiproject'@'localhost' IDENTIFIED BY 'lnbti2024';

-- grant access to database
GRANT ALL PRIVILEGES ON lnbtidb.* TO 'lnbtiproject'@'localhost';

-- refresh privileges
FLUSH PRIVILEGES;