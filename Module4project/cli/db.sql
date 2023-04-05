CREATE DATABASE IF NOT EXISTS apiproject4;

use apiproject4;

CREATE TABLE IF NOT EXISTS posts (
    id VARCHAR(155) NOT NULL,
    title VARCHAR(155) NOT NULL,
    slug VARCHAR(155) NOT NULL,
    content VARCHAR(255) NOT NULL,
    thumbnail VARCHAR(155) NOT NULL,
    author VARCHAR(155) NOT NULL,
    posted_at DATE,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS categories (
    id VARCHAR(155) NOT NULL,
    name VARCHAR(155) NOT NULL,
    description VARCHAR(155) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS posts_category (
    id_post VARCHAR(155) NOT NULL,
    id_category VARCHAR(155) NOT NULL,
    PRIMARY KEY (id_post)
);


