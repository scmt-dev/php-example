CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255) NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    file_type VARCHAR(50),
    file_size INT,
    category_id INT,
    is_public BOOLEAN DEFAULT FALSE,
    uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES document_categories(id)
);

CREATE TABLE document_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE document_access_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    document_id INT,
    user_id INT,
    accessed_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    action ENUM('view', 'download', 'delete') NOT NULL,
    FOREIGN KEY (document_id) REFERENCES documents(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE document_shares (
    id INT AUTO_INCREMENT PRIMARY KEY,
    document_id INT,
    shared_with_email VARCHAR(150),
    shared_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (document_id) REFERENCES documents(id)
);

-- ***** feature in system doc *******
-- ລະບົບເອກະສານ
-- 1. Login
-- 2. Doc Create,update, read, delete, Search(CURDS) 
-- 3. User(CURD)
-- 4. Recent document
-- 5. Manage category(CURDS)
