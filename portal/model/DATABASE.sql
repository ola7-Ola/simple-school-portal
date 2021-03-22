-- create database
CREATE DATABASE 'school';

USE 'school';

-- student table
CREATE TABLE 'student' (
    'id' INT NOT NULL PRIMARY KEY auto_increment,
    'firstName' varchar(15) NOT NULL,
    'lastName' varchar(15) NOT NULL,
    'gender' varchar(10) NOT NULL,
    'email' varchar(30) NOT NULL,
    'contact' varchar(30) NOT NULL,
);

-- staff login table
CREATE TABLE 'staff'(
    'id' INT NOT NULL PRIMARY KEY auto_increment,
    'username' varchar(20) NOT NULL,
    'password' varchar(20) NOT NULL,
);


-- dummy database data
-- insert into staff table
INSERT INTO 'staff' (username, password) VALUES ('ola', 'ola');

-- insert into student table
INSERT INTO 'student' (firstName, lastName,gender,email,contact)
    VALUES ('John','Doe','MALE', 'john@doe.school', '+1 21456745'),
        ('Alice','Doe','FEMALE', 'ALIC@doe.school', '+1 21456789');

