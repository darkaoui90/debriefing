CREATE DATABASE IF NOT EXISTS school_management 
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE school_management;

-- ============================================
-- TABLE 1 : ÉTUDIANTS (Table Principale)
-- ============================================
CREATE TABLE IF NOT EXISTS etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    classe VARCHAR(50) NOT NULL,
    date_naissance DATE,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_classe (classe),
    INDEX idx_nom (nom, prenom)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE 2 : NOTES (Table Liée)
-- ============================================
CREATE TABLE IF NOT EXISTS notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    etudiant_id INT NOT NULL,
    matiere VARCHAR(100) NOT NULL,
    note DECIMAL(5,2) NOT NULL CHECK (note >= 0 AND note <= 20),
    coefficient INT DEFAULT 1,
    date_note DATE NOT NULL,
    commentaire TEXT,
    
    -- CLÉ ÉTRANGÈRE avec CASCADE
    CONSTRAINT fk_etudiant_note 
        FOREIGN KEY (etudiant_id) 
        REFERENCES etudiants(id)
        ON DELETE CASCADE    -- Si étudiant supprimé → ses notes sont supprimées
        ON UPDATE CASCADE,   -- Si ID étudiant modifié → mise à jour auto dans notes
    
    INDEX idx_etudiant (etudiant_id),
    INDEX idx_matiere (matiere)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- DONNÉES DE TEST
-- ============================================

-- Insérer des étudiants
INSERT INTO etudiants (nom, prenom, email, classe, date_naissance) VALUES
('Alami', 'Sara', 'sara.alami@email.com', 'Terminale S', '2006-03-15'),
('Benjelloun', 'Youssef', 'youssef.b@email.com', 'Terminale S', '2006-07-22'),
('Chakir', 'Fatima', 'fatima.c@email.com', 'Première', '2007-11-10'),
('Idrissi', 'Mohammed', 'mohammed.i@email.com', 'Terminale ES', '2006-01-30');

-- Insérer des notes pour les étudiants
INSERT INTO notes (etudiant_id, matiere, note, coefficient, date_note, commentaire) VALUES
-- Notes pour Sara (id=1)
(1, 'Mathématiques', 16.5, 4, '2024-11-15', 'Excellent travail'),
(1, 'Physique', 14.0, 3, '2024-11-20', 'Bon niveau'),
(1, 'Français', 15.5, 2, '2024-11-18', 'Très bien'),

-- Notes pour Youssef (id=2)
(2, 'Mathématiques', 12.0, 4, '2024-11-15', 'Peut mieux faire'),
(2, 'Physique', 13.5, 3, '2024-11-20', 'En progrès'),
(2, 'Anglais', 17.0, 2, '2024-11-22', 'Excellent niveau'),

-- Notes pour Fatima (id=3)
(3, 'Histoire', 18.0, 3, '2024-11-16', 'Excellente analyse'),
(3, 'Français', 16.0, 2, '2024-11-18', 'Très bonne rédaction'),

-- Notes pour Mohammed (id=4)
(4, 'Économie', 15.0, 4, '2024-11-17', 'Bonne compréhension'),
(4, 'Mathématiques', 11.5, 4, '2024-11-15', 'Travail à consolider');