/**
 * This is the DB Schema for the app's database.
 */

-- Permissions table
CREATE TABLE Permission(
    idPermission INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Users table
CREATE TABLE User(
    idUser INTEGER AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(200) NOT NULL,
    password VARCHAR(3000) NOT NULL,
    name VARCHAR(100) NOT NULL,
    aPaterno VARCHAR(100) NOT NULL,
    aMaterno VARCHAR(100),
    email VARCHAR(500),
    active TINYINT(1) NOT NULL DEFAULT 1,
 
    idPermission INTEGER NOT NULL,
    FOREIGN KEY (idPermission) REFERENCES Permission(idPermission)
);

-- Identification types
CREATE TABLE TypeIdentification(
    idTypeIdentification INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200)
);

-- Beneficiary table
CREATE TABLE Beneficiary(
    idBeneficiary INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    aPaterno VARCHAR(100) NOT NULL,
    aMaterno VARCHAR(100),
    email VARCHAR(500) NOT NULL,
    idNumber VARCHAR(1000) NOT NULL,
    birthday DATE,

    idTypeIdentification INTEGER NOT NuLL,
    FOREIGN KEY (idTypeIdentification) REFERENCES TypeIdentification(idTypeIdentification)
);

-- Request category
CREATE TABLE RequestCategory(
    idRequestCategory INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(500)
);

CREATE TABLE Request(
    idRequest INTEGER AUTO_INCREMENT PRIMARY KEY,
    createdAt DATETIME NOT NULL,
    attendedAt DATETIME,
    description TEXT NOT NULL,
    
    idRequestCategory INTEGER NOT NULL,
    idBeneficiary INTEGER NOT NULL,
    FOREIGN KEY (idRequestCategory) REFERENCES RequestCategory(idRequestCategory),
    FOREIGN KEY (idBeneficiary ) REFERENCES Beneficiary(idBeneficiary)
);

