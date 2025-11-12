CREATE TABLE admins (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(100) NOT NULL,
                        email VARCHAR(255) NOT NULL UNIQUE,
                        password_hash VARCHAR(255) NOT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sneakers (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(200) NOT NULL,
                          brand VARCHAR(100) NOT NULL,
                          slug VARCHAR(220) NOT NULL UNIQUE,
                          description TEXT,
                          price DECIMAL(10,2) NOT NULL,
                          image_path VARCHAR(255) NOT NULL,
                          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
