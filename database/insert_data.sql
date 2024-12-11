--Insertion Data-->
INSERT INTO Auteurs (name, email) 
VALUES 
('John Doe', 'john.doe@example.com'),
('Jane Smith', 'jane.smith@example.com'),
('Alice Johnson', 'alice.johnson@example.com');
INSERT INTO packages (name, description) 
VALUES 
('Package A', 'Description for Package A'),
('Package B', 'Description for Package B'),
('Package C', 'Description for Package C');
INSERT INTO versions (packageId, version_number, creation_date) 
VALUES 
(1, '1.0.0', '2023-01-01'),
(1, '1.1.0', '2023-03-15'),
(2, '2.0.0', '2023-05-10'),
(3, '3.0.0', '2023-08-20');
INSERT INTO package_auteur (auteurId, packageId) 
VALUES 
(1, 1),
(3, 3),
(1, 2);
