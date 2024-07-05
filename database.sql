-- Create database
CREATE DATABASE IF NOT EXISTS cuneiform_task;

-- Use the database
USE cuneiform_task;

-- Create table
CREATE TABLE articles (
    id INT(100) PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(100),
    category VARCHAR(100),
    slug VARCHAR(50) UNIQUE NOT NULL,
    created_at TIMESTAMP(6) DEFAULT CURRENT_TIMESTAMP(6)
);

-- sample insert record field
INSERT INTO articles (id, title, description, category, slug, created_at) VALUES
(1, 'First Article', 'This is the description of the first article.', 'Food', 'first-article', '2023-07-05 12:34:56.123456'),
(2, 'Second Article', 'This is the description of the second article.', 'Education', 'second-article', '2023-07-05 12:35:56.123456'),
(3, 'Third Article', 'This is the description of the third article.', 'Businessmen', 'third-article', '2023-07-05 12:36:56.123456'),
(4, 'Fourth Article', 'This is the description of the fourth article.', 'Positions', 'fourth-article', '2023-07-05 12:37:56.123456');

-- sample update record field
UPDATE articles
SET title = 'Updated First Article', description = 'This is the updated description of the first article.'
WHERE id = 1;

-- sample delete record field
DELETE FROM articles
WHERE id = 2;
