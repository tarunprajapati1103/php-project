CREATE DATABASE blood_donation;
USE blood_donation;

CREATE TABLE donors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    blood_type VARCHAR(10) NOT NULL,
    contact VARCHAR(255) NOT NULL
);
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
INSERT INTO admins (username, password) VALUES ('admin', 'admin123');