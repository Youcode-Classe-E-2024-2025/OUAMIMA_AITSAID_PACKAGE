# Ibrahim_Nidam_JSPackages

**Gestion des Packages JavaScript**

**Author du Brief:** Iliass RAIHANI.

**Author:** Ibrahim Nidam.

## Links

- **GitHub Repository :** [View on GitHub](https://github.com/Youcode-Classe-E-2024-2025/OUAMIMA_AITSAID_PACKAGE.git)
- **UML Link :** [View UML](https://lucid.app/lucidchart/889ddd21-91a8-481a-b1ea-4e95a56f0cc1/edit?viewport_loc=-587%2C-1235%2C2711%2C1320%2C.Q4MUjXso07N&invitationId=inv_ccbcac2b-68e1-4020-85bd-a0a1664fc098)
- **ERD Link :** [View ERD](https://dbdiagram.io/d/6756f533e9daa85aca21eeaa)

### créé : 06/12/24

Vous êtes chargé de concevoir une solution complète basée sur un schéma de base de données fourni. Votre projet devra inclure la modélisation, la configuration de l’environnement, et le développement de fonctionnalités essentielles.


# Configuration et Exécution du Projet

### Prérequis
* **Laragon** installé (téléchargez [Laragon](https://laragon.org/download/)).

### Étapes d’installation

1. **Cloner le projet** :
   - Ouvrir un terminal et exécuter :  
     `git clone https://github.com/Youcode-Classe-E-2024-2025/OUAMIMA_AITSAID_PACKAGE.git`

2. **Placer le projet dans le dossier Laragon** :
   - Cliquez sur le bouton **Root** dans Laragon pour ouvrir le dossier `www` (par défaut, `C:\laragon\www`).
   - Le chemin de votre projet devrait être `C:\laragon\www\Gestion_Package`.

3. **Configurer la base de données** :
   - Faites un clic droit sur **Laragon**, puis allez dans **Tools** > **Quick Add** et téléchargez **phpMyAdmin** et **MySQL**.
   - Ouvrir **phpMyAdmin** via Laragon :
     - Dans Laragon, cliquez sur le bouton **Database** pour accéder à phpMyAdmin.
     - Créez une base de données `Gestion_Packages` et importez le fichier `create_database.sql` (disponible dans le dossier `/database/create_database/`).


4. **Configurer Laragon pour le serveur local** :
   - Lancez **Laragon** et démarrez les services **Apache** et **MySQL**,en Clickant sur **Start All**.


5. **Exécuter le projet** :
   - Une fois les services lancés dans Laragon, cliquez sur le bouton **Web** pour accéder à `http://localhost/Gestion_Package` dans votre navigateur.



## **Contexte du projet:**

Une communauté de développeurs JavaScript souhaite moderniser son système de gestion des packages et auteurs avec une application web centralisée. Actuellement, les informations sur les packages et leurs auteurs sont éparpillées, ce qui complique la gestion et la recherche. Le but est de créer un outil simple pour :

- Gérer les packages disponibles et leurs versions.
- Gérer les auteurs contribuant aux packages.
- Permettre une recherche facile des packages par auteur ou mot-clé.

​

1. Schéma de la base de données (ERD)

### Analysez le schéma de base de données fourni et réalisez un cahier des charges décrivant :

    - Les entités principales : (ex. Packages, Auteurs, Versions).
    - Les relations entre les entités : (ex. Un auteur peut contribuer à plusieurs packages).
    - Les besoins fonctionnels du système basés sur ce schéma (ex. recherche des packages par mot-clé, ajout de versions).

​

2. Diagramme UML (Cas d’utilisation)

### Réalisez un diagramme de cas d’utilisation (Use Case Diagram) en identifiant :

    - Les acteurs principaux du système : (ex. utilisateur, administrateur).
    - Les interactions possibles entre les acteurs et le système (ex. ajout de packages, recherche, modification des auteurs).

​

3. Configuration de l’environnement

### Documentez les étapes nécessaires pour installer et configurer l’environnement de travail :

    - Logiciels requis : (ex. serveur local, éditeur de code).
    - Création de la base de données à partir du schéma fourni.
    - Structure des fichiers pour votre projet (ex. répertoires pour les scripts SQL, les fichiers PHP).

​

4. Scripts SQL

### Écrivez les scripts nécessaires pour :

    - Créer la base de données et ses tables.
    - Réaliser des opérations : insertion et lecture sur les tables.
    - Effectuer une requête de jointure simple entre deux tables (ex. packages et auteurs).

​

5. Fonctionnalités en PHP

### Développez les fonctionnalités suivantes :

    - Ajouter des données via des formulaires : (ex. auteurs, packages, versions).
    - Afficher les données de la base : (ex. liste des packages ou des auteurs).

​

### Bonus :

    - Modifier des données via des formulaires (ex. mise à jour des informations sur un package).
    - Supprimer des données (ex. suppression d’un auteur ou d’un package).
    - Recherche par critères : (ex. recherche de packages par mot-clé ou par auteur).
    - Ajoutez, si besoin, des attributs ou des tables supplémentaires pour répondre à des besoins spécifiques (ex. table pour gérer les tags ou les dépendances entre packages).


## **Modalités pédagogiques**

    Travail: individuel
    Durée de travail: 5 jours
    Date de lancement du brief: 09/12/2024 à 09:00 am
    Date limite de soumission: 13/12/2024 avant 12:00 am


## **Modalités d'évaluation**

    - 5 min démonstration 
    - 5 min code Review \ Questions culture Web
    - 10 min mise en situation

## **Livrables**

    Modélisation :
        - Diagramme ERD basé sur le schéma fourni.
        - Diagramme UML de cas d’utilisation.

    Scripts SQL :
        - Scripts pour créer et manipuler la base de données.

    Code PHP :
        - Formulaires et affichage des données connectés à la base de données.

    Documentation :
        - Instructions pour configurer l’environnement et exécuter le projet.

## **Critères de performance**

    - Toutes les entités principales (Auteurs, Packages, Versions, Collaborations) sont correctement définies.
    - Les relations entre les entités (1:N, N:M) sont correctement représentées avec des clés primaires et étrangères.
    - Les attributs essentiels (ex. ID, Nom, Date) sont présents et cohérents.
    - Projet bien documenté dans README.md
    - Script SQL pour la création des Tables
    - Lecture des données dans un tableau
    - Fonctionnalités permettant l’ajouter de données
    - Des jointures fonctionnelles (ex. liste des packages par auteur, historique des versions d’un package).


GESTION_PACKAGE/
│
├── database/
│   ├── create_database.sql       
│   ├── insert_data.sql           
│   ├── queries.sql               
│
├── public/
├── adding/            
│   ├── add_package.php           
│   ├── add_author.php            
│   ├── add_version.php 
├── public/
│   ├── update_package.php
│   ├── update_auteur.php 
│   ├── update_version.php  
├── public/
│   ├── delete_version.php         
│   ├── delete_package.php      
│   ├── delete_auteur.php  
│   
|index.php      
│       
│
├── src/
│   ├── db_conn.php           
│
├── assets/
│   ├── css/                       
│
├── docs/
│   ├── erd.png          
│   ├── README.md                
│
└──   