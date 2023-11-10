CREATE TABLE Medecin(
   Id_Medecin COUNTER,
   Civilite VARCHAR(50),
   Nom VARCHAR(50),
   Prenom VARCHAR(50),
   PRIMARY KEY(Id_Medecin)
);

CREATE TABLE Usager(
   Id_Usager COUNTER,
   Civilite VARCHAR(50),
   Nom VARCHAR(50),
   Prenom VARCHAR(50),
   Adresse VARCHAR(50),
   DateNaissance VARCHAR(50),
   LieuNaissance VARCHAR(50),
   NumSecu VARCHAR(50),
   Id_Medecin INT NOT NULL,
   PRIMARY KEY(Id_Usager),
   FOREIGN KEY(Id_Medecin) REFERENCES Medecin(Id_Medecin)
);

CREATE TABLE RDV(
   Id_Usager INT,
   Id_Medecin INT,
   DateHeureRDV DATETIME,
   DureeConsultationMinutes INT,
   PRIMARY KEY(Id_Usager, Id_Medecin),
   FOREIGN KEY(Id_Usager) REFERENCES Usager(Id_Usager),
   FOREIGN KEY(Id_Medecin) REFERENCES Medecin(Id_Medecin)
);
