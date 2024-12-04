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
('Technology'),
('Sports'),
('Entertainment');

INSERT INTO news (title, content, image, created_at, category_id) VALUES
    ('New iPhone Release', 'Apple unveils the latest iPhone model with groundbreaking features.', 'iphone.jpg', NOW(), 1),
    ('Football World Cup', 'The most anticipated sporting event of the year kicks off.', 'football.jpg', NOW(), 2),
    ('Hollywood Blockbuster', 'A new superhero movie takes the box office by storm.', 'movie.jpg', NOW(), 3),
    ('Tech Startup Funding', 'A promising tech startup secures significant funding.', 'startup.jpg', NOW(), 1),
    ('Olympic Games', 'The greatest athletes in the world compete for glory.', 'olympics.jpg', NOW(), 2),
    ('Music Festival', 'A legendary music festival returns with a star-studded lineup.', 'music.jpg', NOW(), 3),
    ('AI Breakthrough', 'A major advancement in artificial intelligence is announced.', 'ai.jpg', NOW(), 1),
    ('Basketball Championship', 'The NBA Finals is a thrilling showdown between two rivals.', 'basketball.jpg', NOW(), 2),
    ('Award Show', 'Celebrities gather to celebrate the best in film and television.', 'awards.jpg', NOW(), 3),
    ('Gaming Console Launch', 'The newest gaming console hits the market.', 'gaming.jpg', NOW(), 1);

INSERT INTO users (username, password, role) VALUES
('admin', '123456', 1);

select * from users

ALTER TABLE users ADD COLUMN login_token VARCHAR(255);
