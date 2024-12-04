CREATE DATABASE tintuc;
USE tintuc;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    password VARCHAR(255),
    role INT
);

CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255)
);

CREATE TABLE news (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    content TEXT,
    image VARCHAR(255),
    created_at DATETIME,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO categories (name) VALUES
('Chill Guy'),
('N199@'),
('Anh try say gex'),
('Nguyen Quynh'),
('Pickleball');

INSERT INTO news (title, content, created_at, category_id) VALUES
('What is "...just a chill guy"', 'Trending meme last 2024', NOW(), 1),
('Business Growth Tips', 'Top tips for growing your business...', 'business.jpg', NOW(), 2),
('Health Benefits of Yoga', 'Discover the health benefits of yoga...', 'yoga.jpg', NOW(), 3),
('World Cup Highlights', 'Latest highlights from the World Cup...', 'sports.jpg', NOW(), 4),
('Top Movies of 2024', 'Check out the top movies of 2024...', 'movies.jpg', NOW(), 5);


INSERT INTO users (username, password, role) VALUES
('admin', '123456', 1);

select * from users

ALTER TABLE users ADD COLUMN login_token VARCHAR(255);
