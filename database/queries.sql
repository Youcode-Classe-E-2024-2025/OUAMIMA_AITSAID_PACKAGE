--Jointure --> 
SELECT Packages.PackageId ,
Packages.name ,Packages.description,
Auteurs.AuteurId, Auteurs.name ,Auteurs.email FROM Fusion INNER JOIN Packages ON Fusion.PackageId = Packages.PackageId
INNER JOIN Auteurs ON Fusion.AuteurId = Auteurs.AuteurId


SELECT 
    Fusion.id, 
    Versions.version_number, 
    Packages.PackageId,
    Packages.name,
    Packages.description,
    Auteurs.AuteurId, 
    Auteurs.name,
    Auteurs.email
FROM 
    Fusion
INNER JOIN Packages ON Fusion.PackageId = Packages.PackageId
INNER JOIN Auteurs ON Fusion.AuteurId = Auteurs.AuteurId
INNER JOIN Versions ON Versions.PackageId = Packages.PackageId;
