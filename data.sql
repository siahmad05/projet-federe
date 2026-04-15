CREATE TABLE objectifs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enfant_id INT,
    titre VARCHAR(255),
    montant_cible FLOAT,
    montant_actuel FLOAT DEFAULT 0,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enfant_id INT,
    type ENUM('revenu','depense'),
    montant FLOAT,
    description VARCHAR(255),
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE recompenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enfant_id INT,
    titre VARCHAR(255),
    description TEXT,
    obtenue BOOLEAN DEFAULT 1,
    date_obtenue TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users_tab(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(100),
    pw VARCHAR(20),
    user_status ENUM('parent','enfant') 
)
⚙️ 2. config.php