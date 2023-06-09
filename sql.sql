CREATE TABLE users 
(
     id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
     username VARCHAR(30) DEFAULT NULL, 
     firstname VARCHAR(30) DEFAULT NULL, 
     lastname VARCHAR(30) DEFAULT NULL, 
     email VARCHAR(30) DEFAULT NULL, 
     card_number INT DEFAULT NULL, 
     dn VARCHAR(12) DEFAULT NULL, 
     role VARCHAR(15) DEFAULT 'user', 
     password VARCHAR(255) DEFAULT NULL
);

CREATE TABLE cards (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    card_owner INT DEFAULT NULL,
    card_number VARCHAR(13) DEFAULT NULL,   
    card_points INT DEFAULT 0,
    FOREIGN KEY (card_owner) REFERENCES users(id) 
);

---2021071016699 Default card