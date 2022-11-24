CREATE DATABASE cinq_majeur;

use cinq_majeur;

CREATE TABLE user (
                      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                      lastname VARCHAR(255) NOT NULL,
                      firstname VARCHAR(255) NOT NULL,
                      email VARCHAR(150) NOT NULL,
                      `password` VARCHAR(255) NOT NULL
);

CREATE TABLE stepmom (
                         id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                         userID INT NOT NULL,
                         lastname VARCHAR(255) NOT NULL,
                         firstname VARCHAR(255) NOT NULL,
                         age INT NOT NULL
);

CREATE TABLE trip (
                      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                      category INT NOT NULL,
                      trip_name VARCHAR(255) NOT NULL,
                      continent VARCHAR(50) NOT NULL,
                      type VARCHAR(255),
                      duration VARCHAR(255),
                      network_coverage BOOL,
                      distance INT
);

ALTER TABLE stepmom ADD CONSTRAINT fk_user_stepmom FOREIGN KEY(userID)
    REFERENCES user (id);
