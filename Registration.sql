DROP DATABASE IF EXISTS Registration;
CREATE DATABASE Registration;
USE Registration;

-- creating users table
CREATE TABLE `Users` (
`ID` INT NOT NULL AUTO_INCREMENT,
`Forename` VARCHAR(45) NOT NULL, 
`Surname` VARCHAR(45) NOT NULL,
`username` VARCHAR(45) NOT NULL,
`password` VARCHAR(45) NOT NULL,
`emailID` VARCHAR(45) NOT NULL,
PRIMARY KEY (`ID`));


 

