--Creation Data Base-- >
CREATE DATABASE Gestion_Package
SHOW DATABASES
USE Gestion_Package

--Creation des Tables -->
CREATE TABLE Versions (
    VersionId INT AUTO_INCREMENT PRIMARY KEY,
    PackageId INT NOT NULL,
    version_number VARCHAR(20) NOT NULL,
    creation_date DATE NOT NULL,
    FOREIGN KEY (PackageId) REFERENCES Packages(PackageId)
);


CREATE TABLE Packages (
    PackageId INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(250)
);

CREATE TABLE Auteurs (
    AuteurId INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL
);

CREATE TABLE Fusion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    AuteurId INT NOT NULL,
    PackageId INT NOT NULL,
    FOREIGN KEY (AuteurId) REFERENCES Auteurs(AuteurId),
    FOREIGN KEY (PackageId) REFERENCES Packages(PackageId)
);

