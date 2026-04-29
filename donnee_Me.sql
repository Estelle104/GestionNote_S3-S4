-- =========================
-- DONNEES DE TEST
-- =========================

-- Types d'utilisateurs
-- INSERT INTO type_user (id, type) VALUES
-- (1, 'Administrateur'),
-- (2, 'Gestionnaire'),
-- (3, 'Enseignant'),
-- (4, 'Étudiant');

-- Utilisateurs
-- INSERT INTO utilisateur (id, user, pwd, id_type_user) VALUES
-- (1, 'admin', MD5('admin123'), 1),
-- (2, 'gestionnaire', MD5('pass123'), 2),
-- (3, 'prof_inf', MD5('prof123'), 3),
-- (4, 'prof_math', MD5('prof123'), 3);

-- Parcours
INSERT INTO parcours (id, description) VALUES
(1, 'Licence Informatique'),
(2, 'Licence Design');

-- Options
INSERT INTO `option` (id, description) VALUES
(1, 'Développement'),
(2, 'Réseaux et Bases de donnees'),
(3, 'Web et Design');

-- Semestres
INSERT INTO semestre (id, description) VALUES
(3, 'Semestre 3'),
(4, 'Semestre 4');

-- UE - Semestre 3
INSERT INTO ue (id, description, code, credit, id_semestre, is_optionnel) VALUES
(1, 'Programmation orientée objet', 'INF201', 6, 3, 0),
(2, 'Bases de données objets', 'INF202', 6, 3, 0),
(3, 'Programmation système', 'INF203', 4, 3, 0),
(4, 'Réseaux informatiques', 'INF208', 6, 3, 0),
(5, 'Méthodes numériques', 'MTH201', 4, 3, 0),
(6, 'Bases de gestion', 'ORG201', 4, 3, 0);

-- UE - Semestre 4
INSERT INTO ue (id, description, code, credit, id_semestre, is_optionnel) VALUES
(7, 'Éléments Algorithmique', 'INF207', 6, 4, 0),
(8, 'Mini-projet de développement', 'INF210', 10, 4, 0),
(9, 'Système Information géographique', 'INF204', 6, 4, 0),
(10, 'MAO', 'MTH203', 4, 4, 0),
(11, 'Optimisation', 'MTH206', 4, 4, 1);

-- Résultats (Règles de mention)
INSERT INTO resultat (id, mention, min, max) VALUES
(1, 'Ajourné', 0, 5.99),
(2, 'Compensé', 6, 9.99),
(3, 'Passable', 10, 11.99),
(4, 'Assez bien', 12, 13.99),
(5, 'Bien', 14, 15.99),
(6, 'Très bien', 16, 17.99),
(7, 'Excellent', 18, 20);

-- Étudiants
INSERT INTO etudiant (id, nom, prenom, id_parcours, id_option) VALUES
(1, 'Rakoto', 'Andry', 1, 1),
(2, 'Dufour', 'Marie', 1, 1),
(3, 'Lehoux', 'Pierre', 1, 2),
(4, 'Bernier', 'Sophie', 1, 1),
(5, 'Gaillard', 'Jean', 1, 2);

-- Notes - Semestre 3 - Étudiant 1 (Rakoto Andry)
-- INSERT INTO note (id, id_etudiant, id_ue, id_resultat, note) VALUES
-- (1, 1, 1, 6, 10.5),
-- (2, 1, 2, 3, 14),
-- (3, 1, 3, 6, 11),
-- (4, 1, 4, 6, 10),
-- (5, 1, 5, 2, 6.5),
-- (6, 1, 6, 5, 13);

-- -- Notes - Semestre 3 - Étudiant 2 (Dufour Marie)
-- INSERT INTO note (id, id_etudiant, id_ue, id_resultat, note) VALUES
-- (7, 2, 1, 6, 10.5),
-- (8, 2, 2, 2, 14),
-- (9, 2, 3, 6, 11),
-- (10, 2, 4, 6, 10),
-- (11, 2, 5, 3, 9.5),
-- (12, 2, 6, 5, 13);

-- -- Notes - Semestre 3 - Étudiant 3 (Lehoux Pierre)
-- INSERT INTO note (id, id_etudiant, id_ue, id_resultat, note) VALUES
-- (13, 3, 1, 1, 4.5),
-- (14, 3, 2, 2, 7.5),
-- (15, 3, 3, 2, 8),
-- (16, 3, 4, 2, 6),
-- (17, 3, 5, 1, 5),
-- (18, 3, 6, 2, 9);

-- -- Notes - Semestre 3 - Étudiant 4 (Bernier Sophie)
-- INSERT INTO note (id, id_etudiant, id_ue, id_resultat, note) VALUES
-- (19, 4, 1, 7, 15.5),
-- (20, 4, 2, 6, 16),
-- (21, 4, 3, 6, 17),
-- (22, 4, 4, 6, 18),
-- (23, 4, 5, 6, 16.5),
-- (24, 4, 6, 6, 15);

-- -- Notes - Semestre 3 - Étudiant 5 (Gaillard Jean)
-- INSERT INTO note (id, id_etudiant, id_ue, id_resultat, note) VALUES
-- (25, 5, 1, 5, 14.5),
-- (26, 5, 2, 5, 14),
-- (27, 5, 3, 5, 15),
-- (28, 5, 4, 4, 12.5),
-- (29, 5, 5, 5, 14),
-- (30, 5, 6, 4, 13);

-- -- Notes - Semestre 4 - Étudiant 1 (Rakoto Andry)
-- INSERT INTO note (id, id_etudiant, id_ue, id_resultat, note) VALUES
-- (31, 1, 7, 6, 9.5),
-- (32, 1, 8, 5, 12.2),
-- (33, 1, 9, 5, 12),
-- (34, 1, 10, 5, 11.33),
-- (35, 1, 11, 6, 12.25);

-- -- Notes - Semestre 4 - Étudiant 2 (Dufour Marie)
-- INSERT INTO note (id, id_etudiant, id_ue, id_resultat, note) VALUES
-- (36, 2, 7, 6, 13.5),
-- (37, 2, 8, 5, 13.2),
-- (38, 2, 9, 5, 13),
-- (39, 2, 10, 6, 14.33),
-- (40, 2, 11, 6, 15.25);

-- -- Notes - Semestre 4 - Étudiant 3 (Lehoux Pierre)
-- INSERT INTO note (id, id_etudiant, id_ue, id_resultat, note) VALUES
-- (41, 3, 7, 1, 3.5),
-- (42, 3, 8, 1, 5.2),
-- (43, 3, 9, 1, 4),
-- (44, 3, 10, 1, 3.33),
-- (45, 3, 11, 2, 6.25);

-- -- Notes - Semestre 4 - Étudiant 4 (Bernier Sophie)
-- INSERT INTO note (id, id_etudiant, id_ue, id_resultat, note) VALUES
-- (46, 4, 7, 7, 18.5),
-- (47, 4, 8, 7, 17.2),
-- (48, 4, 9, 7, 18),
-- (49, 4, 10, 7, 19.33),
-- (50, 4, 11, 7, 19.25);

-- -- Notes - Semestre 4 - Étudiant 5 (Gaillard Jean)
-- INSERT INTO note (id, id_etudiant, id_ue, id_resultat, note) VALUES
-- (51, 5, 7, 6, 15.5),
-- (52, 5, 8, 6, 14.2),
-- (53, 5, 9, 5, 13),
-- (54, 5, 10, 5, 12.33),
-- (55, 5, 11, 6, 14.25);
