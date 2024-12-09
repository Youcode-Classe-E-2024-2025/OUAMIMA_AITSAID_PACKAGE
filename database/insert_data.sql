--Insertion Data-->
INSERT INTO Auteurs (name, email) VALUES ('oumaima', 'oumaima@gmail.com'), ('mohamed', 'mohamed@gmail.com');
INSERT INTO Packages (name, description) VALUES ('Package1', 'Description1'), ('Package2', 'Description2');
INSERT INTO Versions (PackageId, version_number, creation_date) VALUES (1, '1.0', '2024-01-01');
INSERT INTO Fusion (AuteurId, PackageId) VALUES (1, 1), (2, 2);
