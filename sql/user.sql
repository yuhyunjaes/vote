CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL,
    nickname VARCHAR(100) NOT NULL UNIQUE,
    userid VARCHAR(50) NOT NULL UNIQUE,
    hash_password TEXT NOT NULL,
    salt TEXT NOT NULL,
    email VARCHAR(250) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
