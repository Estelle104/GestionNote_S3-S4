CREATE DATABASE note_S3_S4;

USE note_S3_S4;


-- =========================
-- TABLE TYPE_USER
-- =========================
CREATE TABLE type_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL
);

-- =========================
-- TABLE USER (utilisateur)
-- =========================
CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(50) NOT NULL,
    pwd VARCHAR(100) NOT NULL,
    id_type_user INT
);

-- =========================
-- TABLE PARCOURS
-- =========================
CREATE TABLE parcours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(100) NOT NULL
);

-- =========================
-- TABLE OPTION
-- =========================
CREATE TABLE `option` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(100) NOT NULL
);

-- =========================
-- TABLE SEMESTRE
-- =========================
CREATE TABLE semestre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(50) NOT NULL
);

-- =========================
-- TABLE UE
-- =========================
CREATE TABLE ue (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(100) NOT NULL,
    code VARCHAR(20),
    credit INT,
    id_semestre INT,
    is_optionnel BOOLEAN
);

-- =========================
-- TABLE ETUDIANT
-- =========================
CREATE TABLE etudiant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    id_parcours INT,
    id_option INT
);

-- =========================
-- TABLE RESULTAT
-- =========================
CREATE TABLE resultat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mention VARCHAR(50),
    min DECIMAL(5,2),
    max DECIMAL(5,2)
);

-- =========================
-- TABLE NOTE
-- =========================
CREATE TABLE note (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_etudiant INT,
    id_ue INT,
    id_resultat INT
);