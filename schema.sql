CREATE DATABASE ermilov_doingsdone
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE ermilov_doingsdone;

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
reg_date DATETIME,
name CHAR(255) NOT NULL,
email CHAR(128) NOT NULL UNIQUE,
password CHAR(64) NOT NULL
);

CREATE TABLE tasks (
id INT AUTO_INCREMENT PRIMARY KEY,
date_create DATETIME,
date_exp DATE,
name CHAR(255),
status INT,
task_url CHAR(255) NOT NULL UNIQUE,
cat_id INT,
user_id INT
);

CREATE TABLE projects_cat (
id INT AUTO_INCREMENT PRIMARY KEY,
name CHAR(255) NOT NULL,
user_id INT NOT NULL,
UNIQUE KEY 'category_and_user' ('name','user_id')
); 

CREATE INDEX tasks_search_index ON tasks(name);