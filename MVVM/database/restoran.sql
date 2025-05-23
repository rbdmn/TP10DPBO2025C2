CREATE DATABASE restoran;
USE restoran;

CREATE TABLE Makanan (
    MakananID INT PRIMARY KEY AUTO_INCREMENT,
    NamaMakanan VARCHAR(255) NOT NULL,
    Kategori VARCHAR(100),
    HargaRataRata DECIMAL(8, 2)
);

CREATE TABLE Minuman (
    MinumanID INT PRIMARY KEY AUTO_INCREMENT,
    NamaMinuman VARCHAR(255) NOT NULL,
    Tipe VARCHAR(100),
    HargaRataRata DECIMAL(8, 2)
);

CREATE TABLE Restoran (
    RestaurantID INT PRIMARY KEY AUTO_INCREMENT,
    NamaRestoran VARCHAR(255) NOT NULL,
    JenisKuliner VARCHAR(100),
    IDMakananUnggulan INT,
    IDMinumanUnggulan INT,
    CONSTRAINT FK_MakananUnggulan
        FOREIGN KEY (IDMakananUnggulan)
        REFERENCES Makanan(MakananID)
        ON DELETE SET NULL,
    CONSTRAINT FK_MinumanUnggulan
        FOREIGN KEY (IDMinumanUnggulan)
        REFERENCES Minuman(MinumanID)
        ON DELETE SET NULL
);