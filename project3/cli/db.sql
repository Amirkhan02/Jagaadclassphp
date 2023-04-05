CREATE DATABASE IF NOT EXISTS product_list;

USE product_list;

CREATE TABLE IF NOT EXISTS product (
                                       id INTEGER NOT NULL AUTO_INCREMENT,
                                       name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    quantity VARCHAR(125) NOT NULL,
    PRIMARY KEY (id)
    );
