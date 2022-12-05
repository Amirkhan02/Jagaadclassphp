--users
CREATE TABLE users (
    user_id INTEGER NOT NULL AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(155) NOT NULL,
    password VARCHAR(25) NOT NULL,
    is_active BOOLEAN NOT NULL,
    PRIMARY KEY (user_id)
);


-- accounts
CREATE TABLE accounts (
    account_id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    type VARCHAR(10),
    user_id INTEGER NOT NULL,
    PRIMARY KEY (account_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);


-- transactions

CREATE TABLE transactions (
    transaction_id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(55) NOT NULL,
    amount DECIMAL(19,2) NOT NULL,
    category VARCHAR(255) NOT NULL,
    transaction_date DATETIME NOT NULL,
    occurrence BOOLEAN NOT NULL,
    status VARCHAR(25) NOT NULL,
    type VARCHAR(25) NOT NULL,
    account_id INTEGER NOT NULL,
    PRIMARY KEY (transaction_id),
    FOREIGN KEY (account_id) REFERENCES accounts(account_id)
);


INSERT INTO accounts (name, description, type, user_id)
VALUES ("Credit Card", "My limited credit card", "credit", 1);

INSERT INTO users (full_name, email, password, is_active)
VALUES ("Hammed", 
"khanshittu@jagaad.com", 
"$2y$10$zWe.LLaX.3PyWWB/AAZn1.XIrweSz5fyJKJyF1.5CPlAa5QHao8HC",
TRUE
);